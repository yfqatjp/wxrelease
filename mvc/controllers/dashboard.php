<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends Admin_Controller {
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
		$this->load->model('systemadmin_m');
		$this->load->model("dashboard_m");
		$this->load->model("setting_m");
		$this->load->model("student_m");
		$this->load->model("classes_m");
		$this->load->model("teacher_m");
		$this->load->model("teacher_transport_m");
		$this->load->model("sattendance_m");
		$this->load->model("subject_m");
		$this->load->model("feetype_m");
		$this->load->model("invoice_m");
		//$this->load->model("expense_m");
		$this->load->model("payment_m");
		$this->load->model("student_info_m");
		$this->load->model('routine_m');
		$this->load->model("subject_teacher_details_m");
		$this->load->model("tattendance_m");
		$language = $this->session->userdata('lang');
		$this->lang->load('dashboard', $language);
	}

	public function index() {
		$usertype = $this->session->userdata('usertype');
		$day = abs(date('d'));
		$monthyear = date('m-Y');


		$this->data['subjects'] = [];
		$this->data['subjectID'] = 0;
		$this->data['date'] = date("Y-m-d");

		if($usertype == "Admin") {
			$username = $this->session->userdata('username');
			$this->data['user'] = $this->systemadmin_m->get_single_systemadmin(array('username'  => $username));
			$this->data['student'] = $this->student_m->get_student();
			$this->data['teacher'] = $this->teacher_m->get_teacher();
			$this->data['subject'] = $this->subject_m->get_subject();
			$this->data['setting'] = $this->setting_m->get_setting(1);
			$this->data['routines'] = $this->routine_m->get_join_all();
		} elseif($usertype == "Teacher" || $usertype == "Receptionist" || $usertype == "Salesman" || $usertype == "TeacherManager") {
			$email = $this->session->userdata('email');
			$this->data['user'] = $this->teacher_m->get_single_teacher(array('email'  => $email));
			$this->data['subjects'] = $this->subject_m->get_join_where_teacherID($this->data['user']->teacherID);
			$this->data['student'] = $this->student_m->get_student();
			$this->data['teacher'] = $this->teacher_m->get_teacher();
			$this->data['subject'] = $this->subject_m->get_subject();
			$this->data['routines'] = $this->routine_m->get_join_all();
			$this->data['transportation_expenses'] = $this->teacher_transport_m->get_order_by_teacher_transport(array("teacherID"=>$this->data['user']->teacherID));
			
		}   elseif($usertype == "Student") {
			$email = $this->session->userdata('email');
			$this->data['user'] = $this->student_m->get_single_student(array('email'  => $email));
			$this->data['teacher'] = $this->teacher_m->get_teacher();
			$this->data['subject'] = $this->student_info_m->get_join_where_subject($this->data['user']->classesID);
			$this->data['routines'] = $this->routine_m->get_join_all1($this->data['user']->classesID);
		}
		$this->data["subview"] = "dashboard/index";
		$this->load->view('_layout_main', $this->data);
	}

	//取得课程详细
	function getRoutine() {
		$usertype = $this->session->userdata('usertype');
		if(isset($usertype)) {
			$id = $this->input->post('id');
			$routine= $this->routine_m->get_routine($id);
			if($routine) {
				$subject= $this->subject_m->get_subject($routine->subjectID);
				if($subject){
					$json = array("routineID" => $routine->routineID,
							      "classesID" => $routine->classesID,
							      "sectionID" => $routine->sectionID,
							      "subjectID" => $routine->subjectID,
							      "date" => $routine->date,
							      "day" => $routine->day,
								  "start_time" => $routine->start_time,
								  "end_time" => $routine->end_time,
								  "room" => $routine->room,
							      "color" => $routine->color,
							      "subject" => $subject->subject);
					$teachers = $this->subject_teacher_details_m->get_order_by(array("subjectID" => $routine->subjectID));
					if($teachers){
						$json["teachers"] = '';
						foreach ($teachers as $value) {
							$json["teachers"] = $json["teachers"].$value->name.' ';
						}
					}
					header("Content-Type: application/json", true);
					echo json_encode($json);
					exit;

				}


			}
		}
	}




}

/* End of file dashboard.php */
/* Location: .//D/xampp/htdocs/school/mvc/controllers/dashboard.php */
