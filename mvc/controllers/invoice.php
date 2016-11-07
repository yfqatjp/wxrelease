<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Omnipay\Omnipay;
class Invoice extends Admin_Controller {
/*
| -----------------------------------------------------
| PRODUCT NAME: 	SCHOOL MANAGEMENT
| -----------------------------------------------------
| AUTHOR:			TEAM
| -----------------------------------------------------
| EMAIL:			
| -----------------------------------------------------
| COPYRIGHT:		RESERVED BY LiveTech
| -----------------------------------------------------
| WEBSITE:			
| -----------------------------------------------------
*/
	function __construct() {
		parent::__construct();
		$this->load->model("invoice_m");
		$this->load->model("feetype_m");
		$this->load->model('payment_m');
		$this->load->model("classes_m");
		$this->load->model("student_m");
		$this->load->model('user_m');
		$this->load->model("payment_settings_m");
		$language = $this->session->userdata('lang');
		$this->lang->load('invoice', $language);
	}

	public function index() {
		if($this->input->post('date_from')){
			$this->data['date_from'] = $this->input->post('date_from');
		}else{
			$this->data['date_from'] = date("Y-m-01", time());
		}
		if($this->input->post('date_to')){
			$this->data['date_to'] = $this->input->post('date_to');
		}else{
			$this->data['date_to'] = date("Y-m-t", time());
		}
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" ) {
			// $this->data['date_from'] = $this->input->post('date_from');
			// $this->data['date_to'] = $this->input->post('date_to');
			$this->data['invoices'] = $this->invoice_m->get_invoice_where($this->data['date_from'],$this->data['date_to']);
			$this->data["subview"] = "invoice/index";
			$this->load->view('_layout_main', $this->data);
		} elseif($usertype == "Student") {
			$username = $this->session->userdata("username");
			$student = $this->student_m->get_single_student(array("username" => $username));
			$this->data['invoices'] = $this->invoice_m->get_order_by_invoice(array('studentID' => $student->studentID));
			$this->data["subview"] = "invoice/index";
			$this->load->view('_layout_main', $this->data);
		}  else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	protected function rules() {
		$rules = array(
				array(
					'field' => 'classesID',
					'label' => $this->lang->line("invoice_classesID"),
					'rules' => 'trim|required|xss_clean|max_length[11]|numeric|callback_unique_classID'
				),
				array(
					'field' => 'studentID',
					'label' => $this->lang->line("invoice_studentID"),
					'rules' => 'trim|required|xss_clean|max_length[11]|numeric|callback_unique_studentID'
				),
				array(
					'field' => 'feetype',
					'label' => $this->lang->line("invoice_feetype"),
					'rules' => 'trim|required|xss_clean|max_length[128]'
				),
				array(
					'field' => 'amount',
					'label' => $this->lang->line("invoice_amount"),
					'rules' => 'trim|required|xss_clean|max_length[20]|numeric|callback_valid_number'
				),


			);
		return $rules;
	}

	protected function payment_rules() {
		$rules = array(
				array(
					'field' => 'amount',
					'label' => $this->lang->line("invoice_amount"),
					'rules' => 'trim|required|xss_clean|max_length[11]|numeric|callback_valid_number|callback_valid_amount'
				),
				array(
					'field' => 'payment_method',
					'label' => $this->lang->line("invoice_paymentmethod"),
					'rules' => 'trim|required|xss_clean|max_length[11]'
				),
				array(
					'field' => 'payment_date',
					'label' => $this->lang->line("invoice_date"),
					'rules' => 'trim|required|xss_clean|max_length[10]|callback_date_valid'
				)		
			);
		return $rules;
	}

	public function payment() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" || $usertype == "TeacherManager"|| $usertype == "Receptionist"|| $usertype == "Salesman") {
			$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			if((int)$id) {
				$this->data['invoice'] = $this->invoice_m->get_invoice($id);
				if($this->data['invoice']) {
					// if(($this->data['invoice']->paidamount != $this->data['invoice']->amount) && ($this->data['invoice']->status == 0 || $this->data['invoice']->status == 1)) {
						$this->data["paymentamount"] = $this->input->post('amount');
						$this->data["paymenttype"] = $this->input->post('payment_method');
						$this->data["paymentnote"] = $this->input->post('payment_note');
						$this->data["principal"] = $this->input->post('payment_principal');
						$this->data["paymentclass"]	= $this->input->post('payment_class');
						$this->data["paymentdate"]	= $this->input->post('payment_date');
												
						if($_POST) {
							$payment_method = '';
							$payment_methods = $this->session->userdata("paymentMethod");
							if($this->input->post('payment_method') && array_key_exists($this->input->post('payment_method'), $payment_methods)){
								$payment_method = $payment_methods[$this->input->post('payment_method')];
							}
							
							$this->data["paymentamount"] = $this->input->post('amount');
							$this->data["paymenttype"] = $this->input->post('payment_method');
							$this->data["paymentnote"] = $this->input->post('payment_note');
							$this->data["principal"] = $this->input->post('payment_principal');
							$this->data["paymentclass"]	= $this->input->post('payment_class');

							$rules = $this->payment_rules();
							if($this->input->post('payment_class')) {
								// 缴费类型是 减免学费的场合 缴费方式不需要填写
								if($this->input->post('payment_class') == "1" || $this->input->post('payment_class') == "2" || $this->input->post('payment_class') == "4"){
									unset($rules[1]);
								}
								array_push($rules,array(
									'field' => 'payment_note',
									'label' => $this->lang->line("invoice_note"),
									'rules' => 'trim|required|xss_clean'
								));
							}
							$this->form_validation->set_rules($rules);
							if ($this->form_validation->run() == FALSE) {
								$this->data["subview"] = "invoice/payment";
								$this->load->view('_layout_main', $this->data);
							} else {
								
								// 1 减免学费
								// 2 退费
								// 3 普通缴费
								// 4 增加费用
								$amount = $this->data['invoice']->amount;
								$payable_amount = $this->data['invoice']->paidamount;
								if($this->input->post('payment_class') == "1"){
									//减免学费,学费总额减少
									$amount =  $this->data['invoice']->amount - $this->input->post('amount');
								}elseif($this->input->post('payment_class') == "2"){
									//退费
									//$payable_amount = $this->data['invoice']->paidamount - $this->input->post('amount');
									$payable_amount = $this->input->post('amount') + $this->data['invoice']->paidamount;
								}																															
								elseif($this->input->post('payment_class') == "3"){
									//普通缴费
									$payable_amount = $this->input->post('amount') + $this->data['invoice']->paidamount;
									
								}elseif($this->input->post('payment_class') == "4"){
									
									//增加学费，学费总额增加
									$amount =  $this->data['invoice']->amount + $this->input->post('amount');
								}
								
								//缴费总额大于学费总额，报错
								if ($payable_amount > $this->data['invoice']->amount) {
									//$this->session->set_flashdata('error', 'Payment amount is much than invoice amount');
									$this->session->set_flashdata('error', $this->lang->line('invoice_payment_error'));
									
									redirect(base_url("invoice/payment/$id"));
								} else {
									
									$this->post_data = $this->input->post();
									if($payment_method == $payment_methods[1] 
										|| $payment_method == $payment_methods[2]
										|| $payment_method == $payment_methods[3]
										|| $payment_method == $payment_methods[4]
										|| $payment_method == $payment_methods[5]
										|| $this->input->post('payment_class') == "1"
										|| $this->input->post('payment_class') == "2"
										|| $this->input->post('payment_class') == "4"
										) {
										
										$status = 0;
										if($payable_amount == $this->data['invoice']->amount) {
											$status = 2;
										} else {
											$status = 1;
										}
										$username = $this->session->userdata('username');
										$dbuserID = 0;
										$dbusertype = '';
										$dbuname = '';
										
										//取得管理员姓名
										if($usertype == "Admin") {
											$user = $this->user_m->get_username_row("systemadmin", array("username" => $username));
											$dbuserID = $user->systemadminID;
											$dbusertype = $user->usertype;
											$dbuname = $user->name;
										} 

										$nowpaymenttype = '';
										if(empty($this->data['invoice']->paymenttype)) {
											$nowpaymenttype = $payment_methods[1];
										} else {
											if($this->data['invoice']->paymenttype == $payment_methods[1]) {
												$nowpaymenttype = $payment_methods[1];
											} else {
												$exp = explode(',', $this->data['invoice']->paymenttype);
												if(!in_array($payment_methods[1], $exp)) {
													$nowpaymenttype =  $this->data['invoice']->paymenttype.','.$payment_methods[1];
												} else {
													$nowpaymenttype =  $this->data['invoice']->paymenttype;
												}
											}
										}

										$array = array(
											"amount" => $amount,
											"paidamount" => $payable_amount,
											"status" => $status,
											"paymenttype" => $nowpaymenttype,
											"paiddate" => $this->data["paymentdate"],
											"userID" => $dbuserID,
											"usertype" => $dbusertype,
											'uname' => $dbuname
										);

										//添加缴费记录
										$payment_array = array(
											"invoiceID" => $id,
											"studentID"	=> $this->data['invoice']->studentID,
											"paymentamount" => $this->input->post('amount'),
											"paymenttype" => $payment_method,
											"paymentdate" => $this->data["paymentdate"],
											"paymentmonth" => date('M', strtotime($this->data["paymentdate"])),
											"paymentyear" => date('Y', strtotime($this->data["paymentdate"])),
											"paymentnote"	=> $this->input->post('payment_note'),
											"principal"	=> $this->input->post('payment_principal'),
											"paymentclass"	=> $this->input->post('payment_class')
										);
										if($this->input->post('payment_class') == "1"){
											$payment_array["paymenttype"] = '减免学费';
										}
										if($this->input->post('payment_class') == "2"){
											$payment_array["paymenttype"] = '退费';
										}
										if($this->input->post('payment_class') == "4"){
											$payment_array["paymenttype"] = '增加费用';
										}

										$this->payment_m->insert_payment($payment_array);

										$studentID = $this->data['invoice']->studentID;
										$getstudent = $this->student_m->get_student($studentID);
										//$nowamount = ($getstudent->paidamount)+($this->input->post('amount'));
										
										$this->student_m->update_student(array('totalamount' => $amount,'paidamount' => $payable_amount), $studentID);

										$this->invoice_m->update_invoice($array, $id);
										$this->session->set_flashdata('success', $this->lang->line('menu_success'));
										//redirect(base_url("invoice/view/$id"));

										$classesID = $this->data['invoice']->classesID;
										redirect(base_url("student/view/$studentID/$classesID"));
										
									} else {
										$this->data["subview"] = "invoice/payment";
										$this->load->view('_layout_main', $this->data);
									}
								}
							}
						} else {
							$this->data["subview"] = "invoice/payment";
							$this->load->view('_layout_main', $this->data);
						}
					// } else {
					// 	$this->data["subview"] = "error";
					// 	$this->load->view('_layout_main', $this->data);
					// }
				} else {
					$this->data["subview"] = "error";
					$this->load->view('_layout_main', $this->data);
				}
			} else {
				$this->data["subview"] = "error";
				$this->load->view('_layout_main', $this->data);
			}
		}  else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}
	
	public function delete() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" || $usertype == "TeacherManager") {
			$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			if((int)$id) {
				$this->data['payment'] = $this->payment_m->get_payment($id);
				
	
				if($this->data['payment']) {
	
					    //删除缴费记录
					    $this->payment_m->delete_payment($id);
						

						$studentID = $this->data['payment']->studentID;
						$deletepayment =  $this->data['payment']->paymentamount;
						$payment_class = $this->data['payment']->paymentclass;
						$invoiceID  = $this->data['payment']->invoiceID;
						
						//取得学费记录
						$this->data['invoice'] = $this->invoice_m->get_invoice($this->data['payment']->invoiceID);
						
						
						
						$amount = $this->data['invoice']->amount;
						$payable_amount = $this->data['invoice']->paidamount;
						
						if($payment_class == "1"){
							//减免学费,学费总额减少
							$amount =  $this->data['invoice']->amount +  $deletepayment ;
							
						}elseif($payment_class == "2"){
							
							//退费
							$payable_amount =  $this->data['invoice']->paidamount - $deletepayment ;
						}
						elseif($payment_class == "3"){
							//普通缴费
							$payable_amount = $this->data['invoice']->paidamount - $deletepayment ;
								
						}elseif($payment_class == "4"){															
							//增加学费，学费总额增加
							$amount =  $this->data['invoice']->amount - $deletepayment ;
						}
						

						$this->student_m->update_student(array('totalamount' => $amount,'paidamount' => $payable_amount), $studentID);
						
						$status = 0;
						if($payable_amount == $amount) {
							$status = 2;
						} elseif($payable_amount == 0) {
							$status = 0;
						}else{
							$status = 1;
						}
												
						
						$array = array(
								"amount" => $amount,
								"paidamount" => $payable_amount,
								"status" => $status
						);
						
						
						
						$this->invoice_m->update_invoice($array, $invoiceID);
						
						$this->session->set_flashdata('success', $this->lang->line('menu_success'));
												
					
						
							
						redirect(base_url("student/view/$studentID"));


				} else {
					$this->data["subview"] = "error";
					$this->load->view('_layout_main', $this->data);
				}
			} else {
				$this->data["subview"] = "error";
				$this->load->view('_layout_main', $this->data);
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	
	


	function call_all_student() {
		$classesID = $this->input->post('id');
		if((int)$classesID) {
			echo "<option value='". 0 ."'>". $this->lang->line('invoice_select_student') ."</option>";
			$students = $this->student_m->get_order_by_student(array('classesID' => $classesID));
			foreach ($students as $key => $student) {
				echo "<option value='". $student->studentID ."'>". $student->name ."</option>";
			}
		} else {
			echo "<option value='". 0 ."'>". $this->lang->line('invoice_select_student') ."</option>";
		}
	}

	function feetypecall() {
		$feetype = $this->input->post('feetype');
		if($feetype) {
			$allfeetypes = $this->feetype_m->allfeetype($feetype);

			foreach ($allfeetypes as $allfeetype) {
				echo "<li id='". $allfeetype->feetypeID ."'>".$allfeetype->feetype."</li>";
			}
		}
	}

	function date_valid($date) {
		if(strlen($date) <10) {
			$this->form_validation->set_message("date_valid", "%s is not valid yyyy-mm-dd");
	     	return FALSE;
		} else {
	   		$arr = explode("-", $date);
	        $yyyy  = $arr[0];
	        $mm = $arr[1];
	        $dd = $arr[2];
	      	if(checkdate($mm, $dd,$yyyy)) {
	      		return TRUE;
	      	} else {
	      		$this->form_validation->set_message("date_valid", "%s is not valid yyyy-mm-dd");
	     		return FALSE;
	      	}
	    }
	}

	function unique_classID() {
		if($this->input->post('classesID') == 0) {
			$this->form_validation->set_message("unique_classID", "The %s field is required");
	     	return FALSE;
		}
		return TRUE;
	}

	function valid_number() {
		// if($this->input->post('amount') && $this->input->post('amount') < 0) {
		if($this->input->post('amount') && !is_numeric($this->input->post('amount'))) {
			$this->form_validation->set_message("valid_number", "%s 是无效的数字");
			return FALSE;
		}
		if($this->input->post('amount') < 0){
			$this->form_validation->set_message("valid_number", "不能输入负数");
			return FALSE;			
		}
		
		return TRUE;
	}

	function valid_amount(){
		if($this->input->post('amount') && $this->data['invoice'] && $this->data['invoice']->amount < $this->input->post('amount')) {
			$this->form_validation->set_message("valid_amount", "%s 减免学费不能大于总费用");
			return FALSE;
		}
		return TRUE;
	}

	public function student_list() {
		$studentID = $this->input->post('id');
		if((int)$studentID) {
			$string = base_url("invoice/index/$studentID");
			echo $string;
		} else {
			redirect(base_url("invoice/index"));
		}
	}

	public function userID() {
		$usertype = $this->session->userdata('usertype');
		$username = $this->session->userdata('username');
		if ($usertype=="Admin") {
			$table = "systemadmin";
			$tableID = "systemadminID";
		} else {
			$table = strtolower($usertype);
			$tableID = $table."ID";
		}
		$query = $this->db->get_where($table, array('username' => $username));
		$userID = $query->row()->$tableID;
		return $userID;
	}
}

/* End of file invoice.php */
/* Location: .//D/xampp/htdocs/school/mvc/controllers/invoice.php */
