<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class signin_m extends MY_Model {

	function __construct() {
		parent::__construct();
		$this->load->model("setting_m");
	}

	//验证email的正确性
	public function checkEmail($email){
		$ret=false;
		if(strstr($email, '@') && strstr($email, '.')){
			$reg = '/[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*$/';
			if(preg_match($reg, $email)){
				$ret=true;
			}
		}
		return $ret;
	}	
	
	public function signin() {
		$tables = array('student' => 'student', 'teacher' => 'teacher', 'systemadmin' => 'systemadmin');
		$settings = $this->setting_m->get_setting();
		$lang = $settings[0]->language;

		$array = array();
		$i = 0;
		$username = $this->input->post('username');
		$password = $this->hash($this->input->post('password'));
		$userdata = '';
		
		
		foreach ($tables as $table) {
			
			//邮件地址
			if($this->checkEmail($username)){
				$user = $this->db->get_where($table, array("email" => $username, "password" => $password));
				
			}else{
				$user = $this->db->get_where($table, array("username" => $username, "password" => $password));
			}

			
			$alluserdata = $user->row();

			if(count($alluserdata)) {
				$userdata = $alluserdata;
				$array['permition'][$i] = 'yes';
			} else {
				$array['permition'][$i] = 'no';
			}
			$i++;
		}

		if(in_array('yes', $array['permition'])) {
			if($userdata->usertype == "Student") {
				$data = array(
					"loginuserID" => $userdata->studentID,
					"name" => $userdata->name,
					"email" => $userdata->email,
					"usertype" => $userdata->usertype,
					"username" => $userdata->username,
					"photo" => $userdata->photo,
					"lang" => $lang,
					"loggedin" => TRUE
				);
				$this->session->set_userdata($data);
				return TRUE;
			} elseif($userdata->usertype == "Teacher" || $userdata->usertype == "Salesman" || $userdata->usertype == "Receptionist" || $userdata->usertype == "TeacherManager") {
				
				$data = array(
					"loginuserID" => $userdata->teacherID,
					"name" => $userdata->name,
					"email" => $userdata->email,
					"usertype" => $userdata->teachertype,
					"username" => $userdata->username,
					"photo" => $userdata->photo,
					"lang" => $lang,
					"loggedin" => TRUE
				);
				$this->session->set_userdata($data);
				return TRUE;
			} elseif($userdata->usertype == "Admin") {
				$data = array(
					"loginuserID" => $userdata->systemadminID,
					"name" => $userdata->name,
					"email" => $userdata->email,
					"usertype" => $userdata->usertype,
					"username" => $userdata->username,
					"photo" => $userdata->photo,
					"lang" => $lang,
					"loggedin" => TRUE
				);
				$this->session->set_userdata($data);
				return TRUE;
			} else {
 				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	function change_password() {
		$table = strtolower($this->session->userdata("usertype"));
		if($table == "admin") {
			$table = "systemadmin";
		}

		if($table == "Receptionist" || $table == "Salesman" || $userdata->usertype == "TeacherManager" || $userdata->usertype == "Teacher") {
			$table = "teacher";
		}

		if($table == "Student") {
			$table = "student";
		}
		
		//$username = $this->session->userdata("username");
		$email = $this->session->userdata("email");
		
		$old_password = $this->hash($this->input->post('old_password'));
		$new_password = $this->hash($this->input->post('new_password'));

		$user = $this->db->get_where($table, array("email" => $email, "password" => $old_password));

		$alluserdata = $user->row();

		if(count($alluserdata)) {
			if($alluserdata->password == $old_password){
				$array = array(
					"password" => $new_password
				);
				$this->db->where(array("email" => $email, "password" => $old_password));
				$this->db->update($table, $array);
				$this->session->set_flashdata('success', $this->lang->line('menu_success'));
				return TRUE;
			}
		} else {
			return FALSE;
		}
	}

	public function signout() {
		$this->session->sess_destroy();
	}

	public function loggedin() {
		return (bool) $this->session->userdata("loggedin");
	}
	
	
}

/* End of file signin_m.php */
/* Location: .//D/xampp/htdocs/school/mvc/models/signin_m.php */
