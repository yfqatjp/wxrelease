<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sattendance extends Admin_Controller {
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
		$this->load->model("sattendance_m");
		$this->load->model("teacher_m");
		$this->load->model("classes_m");
		$this->load->model("subject_m");
		$this->load->model("user_m");
		$this->load->model("setting_m");
		$this->load->model("routine_m");
		$this->load->model("code_m");
		$this->data['setting'] = $this->setting_m->get_setting(1);
		if($this->data['setting']->attendance == "subject") {
			$this->load->model("subject_m");
			$this->load->model("subjectattendance_m");
		}
		$language = $this->session->userdata('lang');
		$this->lang->load('sattendance', $language);
		$this->data['month'] = array(
			"01" => "jan",
			"02" => "feb",
			"03" => "mar",
			"04" => "apr",
			"05" => "may",
			"06" => "jun",
			"07" => "jul",
			"08" => "aug",
			"09" => "sep",
			"10" => "oct",
			"11" => "nov",
			"12" => "dec"
		);
	}

	protected function rules() {
		$rules = array(
			array(
				'field' => 'classesID',
				'label' => $this->lang->line("classes_name"),
				'rules' => 'trim|required|xss_clean|max_length[11]|callback_check_classes'
			),
			array(
				'field' => 'date',
				'label' => $this->lang->line("classes_numeric"),
				'rules' => 'trim|required|max_length[10]|xss_clean|callback_date_valid|callback_valid_future_date'
			)
		);
		return $rules;
	}

	protected function subject_rules() {
		$rules = array(
			array(
				'field' => 'subjectID',
				'label' => $this->lang->line("attendance_subject"),
				'rules' => 'trim|required|xss_clean|callback_check_subject'
			),
			array(
				'field' => 'date',
				'label' => $this->lang->line("classes_numeric"),
				'rules' => 'trim|required|max_length[10]|xss_clean|callback_date_valid'
			)
		);
		return $rules;
	}

	public function index() {
		$usertype = $this->session->userdata("usertype");
		$this->data['date'] = date("Y/m");
		if($usertype == "Admin" || $usertype == "Teacher"|| $usertype == "TeacherManager"|| $usertype == "Salesman"|| $usertype == "Receptionist") {
			$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			$this->data['subject_group'] = htmlentities(mysql_real_escape_string($this->uri->segment(4)));
			$this->data['subjectID'] = $id;
			$this->data['code_list'] = $this->code_m->get_order_by_code(array('loadflag'=>"1",'codeName'=>"subjectGroup"));
			if($this->data['subject_group']){
				$this->data['subjects'] = $this->subject_m->get_order_by_subject(array("subjectGroup" => $this->data['subject_group']));
			}else{
				$this->data['subjects'] = [];
			}
			if((int)$id) {
				$this->data['set'] = $id;
				$this->data['students'] = $this->student_m->get_order_by_studen_with_subject($id);
				$this->data['routines'] = $this->routine_m->get_order_by_date(array('subjectID' => $id));

				if($this->data['students']) {

				} else {
					$this->data['students'] = NULL;
				}
				$this->data["subview"] = "sattendance/index";
				$this->load->view('_layout_main', $this->data);
			} else {
				$this->data['students'] = NULL;
				$this->data["subview"] = "sattendance/index";
				$this->load->view('_layout_main', $this->data);
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	public function add() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" || $usertype == "Teacher"|| $usertype == "TeacherManager"|| $usertype == "Salesman"|| $usertype == "Receptionist") {

			$this->data['set'] = 0;
			$this->data['date'] = date("Y-m-d");
			$this->data['day'] = 0;
			$this->data['monthyear'] = 0;
			$username = $this->session->userdata("username");
			$this->data['classes'] = $this->classes_m->get_classes_1();
			$this->data['students'] = array();
			$classesID = $this->input->post("classesID");
			$this->data['code_list'] = $this->code_m->get_order_by_code(array('loadflag'=>"1",'codeName'=>"subjectGroup"));
			$this->data['subject_group'] = 0;

			if($this->data['setting']->attendance == "subject") {
				$this->data['subject_group'] = $this->input->post("subject_group");
				$this->data['subjectID'] = $this->input->post("subjectID");
				if($this->data['subject_group']){
					$this->data['subjects'] = $this->subject_m->get_order_by_subject(array("subjectGroup" => $this->data['subject_group']));
				}else{
					$this->data['subjects'] = [];
				}
			} else {
				$this->data['subjects'] = "empty";
			}

			$this->data['subjectID'] = 0;

			if($_POST) {

				if($this->data['setting']->attendance == "subject") {
					$rules = $this->subject_rules();
				} else {
					$rules = $this->rules();
				}

				$this->form_validation->set_rules($rules);
				if ($this->form_validation->run() == FALSE) {
					$this->data["subview"] = "sattendance/add";
					$this->load->view('_layout_main', $this->data);
				} else {
					$classesID = $this->input->post("classesID");

					if($this->data['setting']->attendance == "subject") {
						$subjectID = $this->input->post("subjectID");
						$this->data['subjectID'] = $subjectID;

					}

					$date = $this->input->post("date");
					$this->data['set'] = $classesID;
					$this->data['date'] = $date;
					$explode_date = explode("-", $date);
					$monthyear = $explode_date[1]."-".$explode_date[0];
					$userID = "";

					$last_day = cal_days_in_month(CAL_GREGORIAN, $explode_date[1], $explode_date[0]);
					if($last_day >= $explode_date[2]) {

						if($usertype == "Admin") {
							$user = $this->user_m->get_username_row("systemadmin", array("username" => $username));
							$userID = $user->systemadminID;
						} elseif($usertype == "Teacher") {
							$user = $this->user_m->get_username_row("teacher", array("username" => $username));
							$userID = $user->teacherID;
						}
						// $students = $this->student_m->get_order_by_student();
						$students = $this->student_m->get_order_by_studen_with_subject_and_date($subjectID, $date);
						if(count($students)) {
							foreach ($students as $key => $student) {

								$this->data['students'][$key] = (object) array_merge( (array)$student, array('ssection' => $student->section));
								
								$studentID = $student->studentID;
								if($this->data['setting']->attendance == "subject") {
									$attendance_monthyear = $this->subjectattendance_m->get_order_by_sub_attendance(array("studentID" => $studentID, "classesID" => $student->classesID, "subjectID" => $subjectID, "monthyear" => $monthyear));
								} else {
									$attendance_monthyear = $this->sattendance_m->get_order_by_attendance(array("studentID" => $studentID, "classesID" => $classesID, "monthyear" => $monthyear));
								}

								if(!count($attendance_monthyear)) {
									if($this->data['setting']->attendance == "subject") {
										$array = array(
											"studentID" => $studentID,
											"classesID" => $student->classesID,
											"subjectID" => $subjectID,
											"userID" => $userID,
											"usertype" => $usertype,
											"monthyear" => $monthyear
										);
										$this->subjectattendance_m->insert_sub_attendance($array);
									} else {
										$array = array(
											"studentID" => $studentID,
											"classesID" => $classesID,
											"userID" => $userID,
											"usertype" => $usertype,
											"monthyear" => $monthyear
										);
										$this->sattendance_m->insert_attendance($array);
									}
								}
							}
							if($this->data['setting']->attendance == "subject") {
								$this->data['attendances'] = $this->subjectattendance_m->get_sub_attendance();
							} else {
								$this->data['attendances'] = $this->sattendance_m->get_attendance();
							}
							$this->data['monthyear'] = $monthyear;
							$this->data['day'] = $explode_date[2];
						}
						$this->data["subview"] = "sattendance/add";
						$this->load->view('_layout_main', $this->data);
					} else {
						$this->data["subview"] = "error";
						$this->load->view('_layout_main', $this->data);
					}
				}
			} else {
				$this->data["subview"] = "sattendance/add";
				$this->load->view('_layout_main', $this->data);
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	public function student_list() {
		// $classID = $this->input->post('id');
		$subjectID = $this->input->post("subjectID");
		if((int)$subjectID) {
			$subject_group = $this->input->post("subject_group");
			$string = base_url("sattendance/index/$subjectID/$subject_group");
			echo $string;
		} else {
			redirect(base_url("sattendance/index"));
		}
	}

	function singl_add() {
		$id = $this->input->post('id');
		$day = $this->input->post('day');
		if((int)$id && (int)$day) {
			$aday = "a".abs($day);

			if($this->data['setting']->attendance == "subject") {
				$attendance_row = $this->subjectattendance_m->get_sub_attendance($id);
				if($attendance_row) {
					if($attendance_row->$aday == "") {
						$this->subjectattendance_m->update_sub_attendance(array($aday => "P"), $id);
						echo $this->lang->line('menu_success');
					} elseif($attendance_row->$aday == "P") {
						$this->subjectattendance_m->update_sub_attendance(array($aday => "A"), $id);
						echo $this->lang->line('menu_success');
					} elseif($attendance_row->$aday == "A") {
						$this->subjectattendance_m->update_sub_attendance(array($aday => "P"), $id);
						echo $this->lang->line('menu_success');
					}
				}
			} else {
				$attendance_row = $this->sattendance_m->get_attendance($id);
				if($attendance_row) {
					if($attendance_row->$aday == "") {
						$this->sattendance_m->update_attendance(array($aday => "P"), $id);
						echo $this->lang->line('menu_success');
					} elseif($attendance_row->$aday == "P") {
						$this->sattendance_m->update_attendance(array($aday => "A"), $id);
						echo $this->lang->line('menu_success');
					} elseif($attendance_row->$aday == "A") {
						$this->sattendance_m->update_attendance(array($aday => "P"), $id);
						echo $this->lang->line('menu_success');
					}
				}
			}

		}
	}

	function all_add() {
		$classes = $this->input->post('classes');
		$day = $this->input->post('day');
		$monthyear = $this->input->post('monthyear');
		$status = 0;
		$status = $this->input->post('status');

		if($status == "checked") {
			$status = "P";
		} elseif($status == "unchecked") {
			$status = "A";
		}
		// if((int)$classes) {
			$array = array("a".abs($day) => $status);
			if($this->data['setting']->attendance == "subject") {
				$subjectID = $this->input->post('subject');
				// $this->subjectattendance_m->update_sub_attendance_classes($array, array("classesID" => $classes, "subjectID" => $subjectID, "monthyear" => $monthyear));
				$this->subjectattendance_m->update_sub_attendance_classes($array, array("subjectID" => $subjectID, "monthyear" => $monthyear));
			} else {
				$this->sattendance_m->update_attendance_classes($array, array("classesID" => $classes, "monthyear" => $monthyear));
			}
			echo $this->lang->line('menu_success');
		// }
	}

	public function view() {
		$usertype = $this->session->userdata("usertype");
		$url = htmlentities(mysql_real_escape_string($this->uri->segment(4)));

		if($this->data['setting']->attendance == "subject") {
			$this->data["subjects"] = $this->subject_m->get_order_by_subject(array("classesID" => $url));
		}

		if($usertype == "Admin" || $usertype == "Teacher"|| $usertype == "TeacherManager"|| $usertype == "Salesman"|| $usertype == "Receptionist") {
			$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));

			if ((int)$id && (int)$url) {
				$this->data["student"] = $this->student_m->get_student($id);
				$this->data["classes"] = $this->student_m->get_class($url);
				if($this->data["student"] && $this->data["classes"]) {
					$this->data['set'] = $url;

					if($this->data['setting']->attendance == "subject") {
						$this->data['attendances'] = $this->subjectattendance_m->get_order_by_sub_attendance(array("studentID" => $id, "classesID" => $url));
					} else {
						$this->data['attendances'] = $this->sattendance_m->get_order_by_attendance(array("studentID" => $id, "classesID" => $url));
					}


					$this->data["subview"] = "sattendance/view";
					$this->load->view('_layout_main', $this->data);
				} else {
					$this->data["subview"] = "error";
					$this->load->view('_layout_main', $this->data);
				}
			} else {
				$this->data["subview"] = "error";
				$this->load->view('_layout_main', $this->data);
			}
		} elseif($usertype == "Student") {
			$username = $this->session->userdata("username");
			$student = $this->student_m->get_single_student(array("username" => $username));
			if($student) {
				$this->data["student"] = $student;
				$this->data['classes'] = $this->classes_m->get_classes($student->classesID);

				if($this->data['setting']->attendance == "subject") {
					$this->data['attendances'] = $this->subjectattendance_m->get_order_by_sub_attendance(array("studentID" => $student->studentID, "classesID" => $student->classesID));
				} else {
					$this->data['attendances'] = $this->sattendance_m->get_order_by_attendance(array("studentID" => $student->studentID, "classesID" => $student->classesID));
				}

				$this->data["subview"] = "sattendance/view";
				$this->load->view('_layout_main', $this->data);
			} else {
				$this->data["subview"] = "error";
				$this->load->view('_layout_main', $this->data);
			}
		}  else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	function subjectcall() {
		$subject_group = $this->input->post('id');

		if((int)$subject_group) {
			$subjects = $this->subject_m->get_order_by_subject(array("subjectGroup" => $subject_group));
			echo "<option value='0'>", $this->lang->line("attendance_select_subject"),"</option>";
			foreach ($subjects as $value) {
				echo "<option value=\"$value->subjectID\">",$value->subject,"</option>";
			}
		}
	}

	public function pstudent_list() {
		$studentID = $this->input->post('id');
		if((int)$studentID) {
			$string = base_url("sattendance/view/$studentID");
			echo $string;
		} else {
			redirect(base_url("sattendance/view"));
		}
	}

	function check_classes() {
		if($this->input->post('classesID') == 0) {
			$this->form_validation->set_message("check_classes", "The %s field is required");
	     	return FALSE;
		}
		return TRUE;
	}

	function check_subject() {
		if($this->input->post('subjectID') == 0) {
			$this->form_validation->set_message("check_subject", "The %s field is required");
	     	return FALSE;
		}
		return TRUE;
	}

	function date_valid($date) {
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


	function valid_future_date($date) {
		$presentdate = date('Y-m-d');
		$date = date("Y-m-d", strtotime($date));
		if($date > $presentdate) {
			// $this->session->set_flashdata('error', 'Date must be less or equel then from present date');
			return FALSE;
		}
		return TRUE;
	}

	public function subjectall() {
		$usertype = $this->session->userdata("usertype");
		$id = $this->input->post('id');
		if((int)$id) {
			if($usertype == "Admin") {
				$allsubject = $this->subject_m->get_order_by_subject(array("classesID" => $id));
				echo "<option value='0'>", $this->lang->line("attendance_select_subject"),"</option>";
				foreach ($allsubject as $value) {
					echo "<option value=\"$value->subjectID\">",$value->subject,"</option>";
				}
			} elseif($usertype == "Teacher") {
				$username = $this->session->userdata("username");
				$teacher = $this->user_m->get_username_row("teacher", array("username" => $username));
				$allsubject = $this->subject_m->get_order_by_subject(array("classesID" => $id, "teacherID" => $teacher->teacherID));
				echo "<option value='0'>", $this->lang->line("attendance_select_subject"),"</option>";
				foreach ($allsubject as $value) {
					echo "<option value=\"$value->subjectID\">",$value->subject,"</option>";
				}
			}
		}
	}
}

/* End of file class.php */
/* Location: .//D/xampp/htdocs/school/mvc/controllers/sattendance.php */
