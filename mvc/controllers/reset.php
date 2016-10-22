<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reset extends CI_Controller {
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
		$this->load->helper("form");
		$this->load->library("email");
		$this->load->library("form_validation");
		$this->load->helper("url");
	}

	protected function rules() {
		$rules = array(
				 array(
					'field' => 'newpassword',
					'label' => "New Password",
					'rules' => "trim|required|xss_clean|min_length[4]|max_length[40]|matches[repassword]"
				),
				array(
					'field' => 'repassword',
					'label' => "Re-Password",
					'rules' => "trim|required|xss_clean|min_length[4]|max_length[40]"
				)
			);
		return $rules;
	}

	protected function rules_email() {
		$rules = array(
				 array(
					'field' => 'email',
					'label' => "Email",
					'rules' => "trim|required|xss_clean|max_length[40]|valid_email"
				)
			);
		return $rules;
	}

	public function index() {
		$this->load->database();
		$this->load->model("reset_m");
		$this->load->library('session');
		$array = array();
		$reset_key = "";
		$tmp_url = "";
		
		$this->data['form_validation'] = "No";
		$this->data['siteinfos'] = $this->reset_m->get_admin();
		if($_POST) {
			$rules = $this->rules_email();
			$this->form_validation->set_rules($rules);
			if ($this->form_validation->run() == FALSE) {
				$this->data['form_validation'] = validation_errors();
				$this->data["subview"] = 'reset/index';
				$this->load->view('_layout_reset', $this->data);
			} else {
			
				$email = $this->input->post('email');
				
				$flag = $this->reset_m->resetURLSend($email);
				
				if($flag==1){
					$this->session->set_flashdata('reset_send', '邮件已发送！');
				}elseif($flag==3){
					$this->session->set_flashdata('reset_error', '邮箱不存在!');
				}else{
					$this->session->set_flashdata('reset_error', '邮件发送失败，请检查邮件配置!');					
				}
				
				$this->load->helper("url");
				redirect(base_url("reset/index"));
			}
		} else {
			$this->data["subview"] = 'reset/index';
			$this->load->view('_layout_reset', $this->data);
		}
	}
  
	public function password() {
		$this->load->model("reset_m");
		$this->load->library('session');
		$array = array();
		$i = 0;
		$key = $this->uri->segment(3);
		$this->data['siteinfos'] = $this->reset_m->get_admin();
		if(!empty($key)) {
			//$dbreset = $this->reset_m->get_reset(1);
			$dbreset = $this->reset_m->get_single_reset(array('keyID' => $key));
			if(count($dbreset)) {
				if($key == $dbreset->keyID) {
					$this->data['form_validation'] = "No";
					$this->data['siteinfos'] = $this->reset_m->get_admin();
					if($_POST) {
						$rules = $this->rules();
						$this->form_validation->set_rules($rules);
						if ($this->form_validation->run() == FALSE) {
							$this->data['form_validation'] = validation_errors();
							$this->data["subview"] = "reset/add";
							$this->load->view('_layout_reset', $this->data);
						} else {
							$password = $this->input->post('newpassword');
							$email = $dbreset->email;

							$tables = array('student' => 'student', 'teacher' => 'teacher', 'systemadmin' => 'systemadmin');
							foreach ($tables as $table) {
								$dbuser = $this->reset_m->get_table_users($table, $email);
								if(count($dbuser)) {
									$data = array('password' => $this->reset_m->hash($password));
									$this->db->update($table, $data, "email = '".$email."'");
									$this->session->set_flashdata('reset_success', '密码初期化成功，请重新登录!');
									//$this->db->truncate('reset');
									$this->reset_m->delete($dbreset->resetID);
									$array['permition'][$i] = 'yes';
								} else {
									$array['permition'][$i] = 'no';
								}
								$i++;
							}

							if(in_array('yes', $array['permition'])) {
								redirect(base_url("signin/index"));
							}
						}
					} else {
						$this->data["subview"] = "reset/add";
						$this->load->view('_layout_reset', $this->data);
					}
				} else {
					echo "<p> Session Out </p>";
				}
			} else {
				echo "<p> Session Out </p>";
			}
		} else {
			echo "<p> Session Out </p>";
		}
	}

}



/* End of file class.php */
/* Location: .//D/xampp/htdocs/school/mvc/controllers/class.php */
