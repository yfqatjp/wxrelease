<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher extends Admin_Controller {
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
		$this->load->model("teacher_m");
		$this->load->model("teacher_transport_m");
		$this->load->model("reset_m");
		$this->load->library("email");
		$language = $this->session->userdata('lang');
		$this->lang->load('teacher', $language);
	}

	public function index() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" || $usertype == "TeacherManager" ){
			$this->data['teachers'] = $this->teacher_m->get_teacher();
			$this->data["subview"] = "teacher/index";
			$this->load->view('_layout_main', $this->data);
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	protected function rules() {
		$rules = array(
			array(
				'field' => 'name',
				'label' => $this->lang->line("teacher_name"),
				'rules' => 'trim|required|xss_clean|max_length[60]'
			),
			array(
				'field' => 'sex',
				'label' => $this->lang->line("teacher_sex"),
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
					'field' => 'teacher_type',
					'label' => $this->lang->line("teacher_type"),
					'rules' => 'trim|required|max_length[30]|xss_clean'
			),
			array(
				'field' => 'email',
				'label' => $this->lang->line("teacher_email"),
				'rules' => 'trim|required|max_length[40]|valid_email|xss_clean|callback_unique_email'
			),
			array(
				'field' => 'phone',
				'label' => $this->lang->line("teacher_phone"),
				'rules' => 'trim|min_length[5]|max_length[25]|xss_clean'
			),
			array(
				'field' => 'address',
				'label' => $this->lang->line("teacher_address"),
				'rules' => 'trim|max_length[200]|xss_clean'
			),
			array(
				'field' => 'jod',
				'label' => $this->lang->line("teacher_jod"),
				'rules' => 'trim|required|max_length[10]|callback_date_valid|xss_clean'
			),
			array(
				'field' => 'wage_type',
				'label' => $this->lang->line("teacher_wage_type"),
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'fixed_remuneration',
				'label' => $this->lang->line("teacher_wage_fixed_remuneration"),
				'rules' => 'trim|required|numeric|max_length[11]|xss_clean|callback_valid_number'
			),
			array(
				'field' => 'affairs_timing_remuneration',
				'label' => $this->lang->line("teacher_wage_affairs_timing_remuneration"),
				'rules' => 'trim|required|numeric|max_length[11]|xss_clean|callback_valid_number'
			),
			array(
				'field' => 'lecture_timing_remuneration',
				'label' => $this->lang->line("teacher_wage_lecture_timing_remuneration"),
				'rules' => 'trim|required|numeric|max_length[11]|xss_clean|callback_valid_number'
			),
			array(
				'field' => 'vip_timing_remuneration',
				'label' => $this->lang->line("teacher_wage_vip_timing_remuneration"),
				'rules' => 'trim|required|numeric|max_length[11]|xss_clean|callback_valid_number'
			),
		);
		return $rules;
	}

	function insert_with_image($username) {
	    $random = rand(1, 10000000000000000);
	    $makeRandom = hash('sha512', $random. $username . config_item("encryption_key"));
	    return $makeRandom;
	}

	public function add() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" || $usertype == "TeacherManager" ){
			if($_POST) {
				$rules = $this->rules();
				$this->form_validation->set_rules($rules);
				if ($this->form_validation->run() == FALSE) {
					$this->data['form_validation'] = validation_errors();
					$this->data["subview"] = "teacher/add";
					$this->load->view('_layout_main', $this->data);
				} else {
					$array = array();
					$array['name'] = $this->input->post("name");
					$array['designation'] = $this->input->post("designation");
					$array["dob"] = date("Y-m-d", strtotime($this->input->post("dob")));
					$array["sex"] = $this->input->post("sex");
					$array["teachertype"] = $this->input->post("teacher_type");
					$array["bankname"] = $this->input->post("teacher_bank_name");
					$array["bankbranch"] = $this->input->post("teacher_bank_branch");
					$array["bankaccount"] = $this->input->post("teacher_bank_account");
					$array["bankaccountname"] = $this->input->post("teacher_bank_account_name");
					$array["teacherschool"] = $this->input->post("teacher_school");
					$array["teacherspecial"] = $this->input->post("teacher_special");
					$array['religion'] = $this->input->post("religion");
					$array['email'] = $this->input->post("email");
					$array['phone'] = $this->input->post("phone");
					$array['address'] = $this->input->post("address");
					$array['jod'] = date("Y-m-d", strtotime($this->input->post("jod")));
					if(is_numeric($this->input->post("wage_type"))){
						$array['wage_type'] = $this->input->post("wage_type");
					}else{
						$array['wage_type'] = 0;
					}
					if(is_numeric($this->input->post("fixed_remuneration"))){
						$array['fixed_remuneration'] = $this->input->post("fixed_remuneration");
					}else{
						$array['fixed_remuneration'] = 0;
					}
					if(is_numeric($this->input->post("affairs_timing_remuneration"))){
						$array['affairs_timing_remuneration'] = $this->input->post("affairs_timing_remuneration");
					}else{
						$array['affairs_timing_remuneration'] = 0;
					}
					if(is_numeric($this->input->post("lecture_timing_remuneration"))){
						$array['lecture_timing_remuneration'] = $this->input->post("lecture_timing_remuneration");
					}else{
						$array['lecture_timing_remuneration'] = 0;
					}
					if(is_numeric($this->input->post("vip_timing_remuneration"))){
						$array['vip_timing_remuneration'] = $this->input->post("vip_timing_remuneration");
					}else{
						$array['vip_timing_remuneration'] = 0;
					}
					$array['username'] = $this->input->post("username");
					$array['password'] = $this->teacher_m->hash($this->input->post("password"));
					$array['usertype'] = "Teacher";
					$array["create_date"] = date("Y-m-d h:i:s");
					$array["modify_date"] = date("Y-m-d h:i:s");
					$array["create_userID"] = $this->session->userdata('loginuserID');
					$array["create_username"] = $this->session->userdata('username');
					$array["create_usertype"] = $this->session->userdata('usertype');
					$array["teacheractive"] = 0;


					$new_file = "defualt.png";
					if($_FILES["image"]['name'] !="") {
						if($this->data['teacher']->photo != 'defualt.png') {
							unlink(FCPATH.'uploads/images/'.$this->data['teacher']->photo);
						}
						$file_name = $_FILES["image"]['name'];
						$file_name_rename = $this->insert_with_image($this->input->post("username"));
			            $explode = explode('.', $file_name);
			            if(count($explode) >= 2) {
				            $new_file = $file_name_rename.'.'.$explode[1];
							$config['upload_path'] = "./uploads/images";
							$config['allowed_types'] = "gif|jpg|png";
							$config['file_name'] = $new_file;
							$config['max_size'] = '1024';
							$config['max_width'] = '3000';
							$config['max_height'] = '3000';
							$array['photo'] = $new_file;
							$this->load->library('upload', $config);
							if(!$this->upload->do_upload("image")) {
								$this->data["image"] = $this->upload->display_errors();
								$this->data["subview"] = "teacher/add";
								$this->load->view('_layout_main', $this->data);
							} else {
								$data = array("upload_data" => $this->upload->data());
								$this->teacher_m->insert_teacher($array);
								$this->session->set_flashdata('success', $this->lang->line('menu_success'));
								redirect(base_url("teacher/index"));
							}
						} else {
							$this->data["image"] = "Invalid file";
							$this->data["subview"] = "teacher/add";
							$this->load->view('_layout_main', $this->data);
						}
					} else {
						$array["photo"] = $new_file;
						$this->teacher_m->insert_teacher($array);
						$this->session->set_flashdata('success', $this->lang->line('menu_success'));
						redirect(base_url("teacher/index"));
					}
				}
			} else {
				$this->data["subview"] = "teacher/add";
				$this->load->view('_layout_main', $this->data);
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	public function view() {
		$usertype = $this->session->userdata('usertype');
		if ($usertype) {
			$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			if ((int)$id) {
				$this->data['teacher'] = $this->teacher_m->get_teacher($id);
				if($this->data['teacher']) {
					$option_type = "transportation_expenses";
					$this->data['transportation_expenses'] = $this->teacher_transport_m->get_order_by_teacher_transport(array("teacherID" => $id));
					$this->data["subview"] = "teacher/view";
					$this->load->view('_layout_main', $this->data);
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

	public function edit() {
		$usertype = $this->session->userdata("usertype");
		$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
		
		if($usertype == "Teacher" || $usertype == "Salesman"|| $usertype == "Receptionist"){
			$loginID = $this->session->userdata("loginuserID");
			if((int)$id && $id != $loginID){
				$this->data["subview"] = "error";
				$this->load->view('_layout_main', $this->data);
				return;
			}
		}
		
		if($usertype == "Admin" || $usertype == "TeacherManager" || $usertype == "Teacher" || $usertype == "Salesman"|| $usertype == "Receptionist"){
			
			if((int)$id) {
				$this->data['teacher'] = $this->teacher_m->get_teacher($id);
			
				if($this->data['teacher']) {
					if($_POST) {
						$rules = $this->rules();
						//工资不能编辑
						if($usertype == "Teacher" || $usertype == "Salesman"|| $usertype == "Receptionist"){
								
							unset($rules[7],$rules[8], $rules[9],$rules[10],$rules[11]);
						}
						
						$this->form_validation->set_rules($rules);
						
						
												
						if ($this->form_validation->run() == FALSE) {
							$this->data["subview"] = "teacher/edit";
							$this->load->view('_layout_main', $this->data);
						} else {
							$array = array();
							$array['name'] = $this->input->post("name");
							$array['designation'] = $this->input->post("designation");
							$array["dob"] = date("Y-m-d", strtotime($this->input->post("dob")));
							$array["sex"] = $this->input->post("sex");
							$array["teachertype"] = $this->input->post("teacher_type");
							$array["bankname"] = $this->input->post("teacher_bank_name");
							$array["bankbranch"] = $this->input->post("teacher_bank_branch");
							$array["bankaccount"] = $this->input->post("teacher_bank_account");
							$array["bankaccountname"] = $this->input->post("teacher_bank_account_name");
							$array["teacherschool"] = $this->input->post("teacher_school");
							$array["teacherspecial"] = $this->input->post("teacher_special");
							$array['religion'] = $this->input->post("religion");
							$array['email'] = $this->input->post("email");
							$array['phone'] = $this->input->post("phone");
							$array['address'] = $this->input->post("address");
							$array['jod'] = date("Y-m-d", strtotime($this->input->post("jod")));
							
							if($usertype == "Admin" || $usertype == "TeacherManager"){
								if(is_numeric($this->input->post("wage_type"))){
									$array['wage_type'] = $this->input->post("wage_type");
								}else{
									$array['wage_type'] = 0;
								}
								if(is_numeric($this->input->post("fixed_remuneration"))){
									$array['fixed_remuneration'] = $this->input->post("fixed_remuneration");
								}else{
									$array['fixed_remuneration'] = 0;
								}
								if(is_numeric($this->input->post("affairs_timing_remuneration"))){
									$array['affairs_timing_remuneration'] = $this->input->post("affairs_timing_remuneration");
								}else{
									$array['affairs_timing_remuneration'] = 0;
								}
								if(is_numeric($this->input->post("lecture_timing_remuneration"))){
									$array['lecture_timing_remuneration'] = $this->input->post("lecture_timing_remuneration");
								}else{
									$array['lecture_timing_remuneration'] = 0;
								}
								if(is_numeric($this->input->post("vip_timing_remuneration"))){
									$array['vip_timing_remuneration'] = $this->input->post("vip_timing_remuneration");
								}else{
									$array['vip_timing_remuneration'] = 0;
								}
							}
							$array["modify_date"] = date("Y-m-d h:i:s");

							if($_FILES["image"]['name'] !="") {
								if($this->data['teacher']->photo != 'defualt.png') {
									unlink(FCPATH.'uploads/images/'.$this->data['teacher']->photo);
								}
								$file_name = $_FILES["image"]['name'];
								$file_name_rename = $this->insert_with_image($this->data['teacher']->username);
					            $explode = explode('.', $file_name);
					            if(count($explode) >= 2) {
						            $new_file = $file_name_rename.'.'.$explode[1];
									$config['upload_path'] = "./uploads/images";
									$config['allowed_types'] = "gif|jpg|png";
									$config['file_name'] = $new_file;
									$config['max_size'] = '1024';
									$config['max_width'] = '3000';
									$config['max_height'] = '3000';
									$array['photo'] = $new_file;
									$this->load->library('upload', $config);
									if(!$this->upload->do_upload("image")) {
										$this->data["image"] = $this->upload->display_errors();
										$this->data["subview"] = "teacher/edit";
										$this->load->view('_layout_main', $this->data);
									} else {
										$data = array("upload_data" => $this->upload->data());
										$this->teacher_m->update_teacher($array, $id);
										$this->session->set_flashdata('success', $this->lang->line('menu_success'));
										redirect(base_url("teacher/index"));
									}
								} else {
									$this->data["image"] = "Invalid file";
									$this->data["subview"] = "teacher/edit";
									$this->load->view('_layout_main', $this->data);
								}
							} else {
								$this->teacher_m->update_teacher($array, $id);
								$this->session->set_flashdata('success', $this->lang->line('menu_success'));
								redirect(base_url("teacher/view/".$id));
							}
						}
					} else {
						$this->data["subview"] = "teacher/edit";
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
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	public function delete() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin"){
			$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			if((int)$id) {
				$this->data['teacher'] = $this->teacher_m->get_teacher($id);
				if($this->data['teacher']) {
					if($this->data['teacher']->photo != 'defualt.png') {
						unlink(FCPATH.'uploads/images/'.$this->data['teacher']->photo);
					}
					$this->teacher_m->delete_teacher($id);
					$this->session->set_flashdata('success', $this->lang->line('menu_success'));
					redirect(base_url("teacher/index"));
				} else {
					redirect(base_url("teacher/index"));
				}
			} else {
				redirect(base_url("teacher/index"));
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	public function addTransportationExpenses() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" || $usertype == "TeacherManager" || $usertype == "Salesman"|| $usertype == "Receptionist"|| $usertype == "Teacher") {
			$teacherID = $this->input->post('teacherID');
		
			$teacher_transport_ID = $this->input->post('option_type_id');
			
			$this->data['teacher'] = $this->teacher_m->get_teacher($teacherID);
			
			if($this->data['teacher']) {				
				$arrayinput = 
				array("teacherID" => $teacherID,
					  "transport_name" => $this->input->post('name'),
					  "start_station" => $this->input->post('start_station'),
					  "end_station" => $this->input->post('end_station'),
					  "fare" => $this->input->post('fare'),
					  "note" => $this->input->post('note'),
					  "createusername" => $this->session->userdata('name'),
					 );

				//添加
				if($teacher_transport_ID==""){
					$this->teacher_transport_m->insert_teacher_transport($arrayinput);					
					$this->session->set_flashdata('success', $this->lang->line('addTransportationExpenses_success'));
					
				}else{
					//编辑
					$this->teacher_transport_m->update_teacher_transport($arrayinput,$teacher_transport_ID);
					
					$this->session->set_flashdata('success', $this->lang->line('editTransportationExpenses_success'));
				}
			}else{
				$this->data["subview"] = "error";
				$this->load->view('_layout_main', $this->data);
			}

		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	public function deleteTransportationExpenses(){

			$usertype = $this->session->userdata("usertype");
			if($usertype == "Admin" || $usertype == "TeacherManager") {
				$teacherID = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
				$id = htmlentities(mysql_real_escape_string($this->uri->segment(4)));
				if($teacherID && $id){
					
					$this->teacher_transport_m->delete_teacher_transport($id);
					
					$this->session->set_flashdata('success', $this->lang->line('deleteTransportationExpenses_success'));
				}
				redirect(base_url("teacher/view/$teacherID"));
			} else {
				$this->data["subview"] = "error";
				$this->load->view('_layout_main', $this->data);
			}
	}

	private function transportation_expenses_data($teacherID,$option_type,$option_type_id){
		$data = array(
			array(
				'teacherID' => $teacherID,
				'option_type' => $option_type,
				'option_type_id' => $option_type_id,
				'option_key' => '',
				'option_value' => ''
			),
			array(
				'teacherID' => $teacherID,
				'option_type' => $option_type,
				'option_type_id' => $option_type_id,
				'option_key' => '',
				'option_value' => ''
			),
			array(
				'teacherID' => $teacherID,
				'option_type' => $option_type,
				'option_type_id' => $option_type_id,
				'option_key' => '',
				'option_value' => ''
			),
			array(
				'teacherID' => $teacherID,
				'option_type' => $option_type,
				'option_type_id' => $option_type_id,
				'option_key' => '',
				'option_value' => ''
			),
			array(
				'teacherID' => $teacherID,
				'option_type' => $option_type,
				'option_type_id' => $option_type_id,
				'option_key' => '',
				'option_value' => ''
			),
			array(
				'teacherID' => $teacherID,
				'option_type' => $option_type,
				'option_type_id' => $option_type_id,
				'option_key' => 'createusername',
				'option_value' => $this->session->userdata('name')
			)
		);
		return $data;
	}

	public function lol_username() {
		$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
		if((int)$id) {
			$teacher_info = $this->user_m->get_single_user(array('teacherID' => $id));
			$tables = array('student' => 'student', 'teacher' => 'teacher', 'systemadmin' => 'systemadmin');
			$array = array();
			$i = 0;
			foreach ($tables as $table) {
				$user = $this->teacher_m->get_username($table, array("username" => $this->input->post('username'), "email !=" => $teacher_info->email));
				if(count($user)) {
					$this->form_validation->set_message("lol_username", "%s already exists");
					$array['permition'][$i] = 'no';
				} else {
					$array['permition'][$i] = 'yes';
				}
				$i++;
			}
			if(in_array('no', $array['permition'])) {
				return FALSE;
			} else {
				return TRUE;
			}
		} else {
			$tables = array('student' => 'student',  'teacher' => 'teacher',  'systemadmin' => 'systemadmin');
			$array = array();
			$i = 0;
			foreach ($tables as $table) {
				$user = $this->teacher_m->get_username($table, array("username" => $this->input->post('username')));
				if(count($user)) {
					$this->form_validation->set_message("lol_username", "%s already exists");
					$array['permition'][$i] = 'no';
				} else {
					$array['permition'][$i] = 'yes';
				}
				$i++;
			}

			if(in_array('no', $array['permition'])) {
				return FALSE;
			} else {
				return TRUE;
			}
		}
	}

	public function date_valid($date) {
		if($date == null) {return TRUE;}
		if(strlen($date) <10) {
			$this->form_validation->set_message("date_valid", "%s is not valid yyyy-mm-dd");
	     	return FALSE;
		} else {
	   		$arr = explode("-", $date);
	        $yyyy = $arr[0];
	        $mm = $arr[1];
	        $dd = $arr[2];
	      	if(checkdate($mm, $dd, $yyyy)) {
	      		return TRUE;
	      	} else {
	      		$this->form_validation->set_message("date_valid", "%s is not valid yyyy-mm-dd");
	     		return FALSE;
	      	}
	    }
	}


	public function unique_email() {
		$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
		if((int)$id) {
			$teacher_info = $this->teacher_m->get_single_teacher(array('teacherID' => $id));
			$tables = array('student' => 'student',  'teacher' => 'teacher',  'systemadmin' => 'systemadmin');
			$array = array();
			$i = 0;
			foreach ($tables as $table) {
				$user = $this->teacher_m->get_username($table, array("email" => $this->input->post('email'), 'username !=' => $teacher_info->username));
				if(count($user)) {
					$this->form_validation->set_message("unique_email", "%s already exists");
					$array['permition'][$i] = 'no';
				} else {
					$array['permition'][$i] = 'yes';
				}
				$i++;
			}
			if(in_array('no', $array['permition'])) {
				return FALSE;
			} else {
				return TRUE;
			}
		} else {
			$tables = array('student' => 'student',  'teacher' => 'teacher',  'systemadmin' => 'systemadmin');
			$array = array();
			$i = 0;
			foreach ($tables as $table) {
				$user = $this->teacher_m->get_username($table, array("email" => $this->input->post('email')));
				if(count($user)) {
					$this->form_validation->set_message("unique_email", "%s already exists");
					$array['permition'][$i] = 'no';
				} else {
					$array['permition'][$i] = 'yes';
				}
				$i++;
			}

			if(in_array('no', $array['permition'])) {
				return FALSE;
			} else {
				return TRUE;
			}
		}
	}

	function active() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" || $usertype == "TeacherManager") {
			$id = $this->input->post('id');
			$status = $this->input->post('status');
			if($id != '' && $status != '') {
				if((int)$id) {
					if($status == 'chacked') {
						$teacher = $this->teacher_m->get_teacher($id);
						$this->teacher_m->update_teacher(array('teacheractive' => 1), $id);

						$flag = $this->reset_m->resetURLSend($teacher->email,"ACTIVE");

						if($flag == 1){
							echo 'Success';
						}elseif($flag==3){
							echo 'Error';
						}else{
							echo 'Error';
						}


					} elseif($status == 'unchacked') {
						$this->teacher_m->update_teacher(array('teacheractive' => 0), $id);
						echo 'Success';
					} else {
						echo "Error";
					}
				} else {
					echo "Error";
				}
			} else {
				echo "Error";
			}
		} else {
			echo "Error";
		}
	}

	function valid_number() {
		if($this->input->post('amount') < 0) {
			$this->form_validation->set_message("valid_number", "%s 是无效数字");
			return FALSE;
		}
		return TRUE;
	}
}

/* End of file teacher.php */
/* Location: .//D/xampp/htdocs/school/mvc/controllers/teacher.php */
