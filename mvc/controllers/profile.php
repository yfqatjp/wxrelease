<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends Admin_Controller {
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
		$this->load->model("student_m");

		$this->load->model("teacher_m");
		$this->load->model("user_m");
		$this->load->model("systemadmin_m");
		$language = $this->session->userdata('lang');
		$this->lang->load('profile', $language);
	}

	public function index() {
		$usertype = $this->session->userdata("usertype");
		$username = $this->session->userdata('username');
		if($usertype == "Admin") {
			$this->data['admin'] = $this->systemadmin_m->get_systemadmin(array('username' => $username));
			$this->data["subview"] = "profile/index";
			$this->load->view('_layout_main', $this->data);
		} elseif($usertype == "Student") {
			$student = $this->student_m->get_single_student(array('username' => $username));
			$this->data["student"] = $this->student_m->get_student($student->studentID);
			$this->data["class"] = $this->student_m->get_class($student->classesID);
			if($this->data["student"] && $this->data["class"]) {
			
				$this->data["subview"] = "profile/index";
				$this->load->view('_layout_main', $this->data);
			} else {
				$this->data["subview"] = "error";
				$this->load->view('_layout_main', $this->data);
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}
}

/* End of file book.php */
/* Location: .//D/xampp/htdocs/school/mvc/controllers/book.php */
