<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Subject extends Admin_Controller {
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
		$this->load->model("subject_m");
		$this->load->model("student_info_m");
		$this->load->model("classes_m");
		$this->load->model("teacher_m");
		$this->load->model("student_m");
		$this->load->model("code_m");		
		$this->load->model("subject_teacher_details_m");
		$language = $this->session->userdata('lang');
		$this->lang->load('subject', $language);	
	}

	public function index() {
		$usertype = $this->session->userdata("usertype");
		$this->data['subjectgroups'] = $this->code_m->getcodeToArray(array('codeName'=>'subjectGroup'));
				
		if($usertype == "Admin" || $usertype == "TeacherManager" || $usertype == "Teacher") {
			$this->data['subjects'] = $this->subject_m->get();
			$this->data["subview"] = "subject/index";
			$this->load->view('_layout_main', $this->data);

		} elseif($usertype == "Student") {
			$student = $this->student_info_m->get_student_info();
			$this->data['subjects'] = $this->student_info_m->get_join_where_subject($student->classesID);
			$this->data["subview"] = "subject/index";
			$this->load->view('_layout_main', $this->data);
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	protected function rules() {
		$rules = array(
				array(
						'field' => 'subject_group',
						'label' => $this->lang->line("subject_group"),
						'rules' => 'trim|required|max_length[30]|xss_clean'
				),
				array(
					'field' => 'subject', 
					'label' => $this->lang->line("subject_name"), 
					'rules' => 'trim|required|xss_clean|max_length[60]|callback_unique_subject'
				), 
				array(
					'field' => 'amount',
					'label' => $this->lang->line("subject_amount"),
					'rules' => 'trim|required|numeric|max_length[11]|xss_clean|callback_valid_number'
				),
			);
		return $rules;
	}

	public function add() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" || $usertype == "TeacherManager" ) {
			$this->data['classes'] = $this->subject_m->get_classes();
			$this->data['teachers'] = $this->teacher_m->get_teacher();
					
			$this->data['subjectgroups'] = $this->code_m->getcodeToArray(array('codeName'=>'subjectGroup'));
			
			if($_POST) {
				$this->data["teacherIDs"] = $this->input->post("teacherIDs_input");
				$rules = $this->rules();
				$this->form_validation->set_rules($rules);
				if ($this->form_validation->run() == FALSE) { 
					$this->data["subview"] = "subject/add";
					$this->load->view('_layout_main', $this->data);			
				} else {
					// $teacher = $this->teacher_m->get_teacher($this->input->post("teacherID"));
					$array = array(
						// "classesID" => $this->input->post("classesID"),
						"subject" => $this->input->post("subject"),
						"subject_author" => $this->input->post("subject_author"),							
						"subjectGroup" => $this->input->post("subject_group"),
						"subject_code" => $this->input->post("subject_code"),
						"amount" => $this->input->post("amount"),
						// "teacher_name" => $teacher->name,
						"create_date" => date("Y-m-d h:i:s"),
						"modify_date" => date("Y-m-d h:i:s"),
						"create_userID" => $this->session->userdata('loginuserID'),
						"create_username" => $this->session->userdata('username'),
						"create_usertype" => $this->session->userdata('usertype')
					);
					$id = $this->subject_m->insert_subject($array);
					if($id){
						$this->insert_subject_teacher_details($id);
					}
					$this->session->set_flashdata('success', $this->lang->line('menu_success'));
					redirect(base_url("subject/index"));
				}
			} else {
				$this->data["subview"] = "subject/add";
				$this->load->view('_layout_main', $this->data);
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	public function edit() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" || $usertype == "TeacherManager" ) {
			$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			// $url = htmlentities(mysql_real_escape_string($this->uri->segment(4)));
			// if((int)$id && (int)$url) {
			if((int)$id) {
				$this->data['classes'] = $this->subject_m->get_classes();
				$this->data['teachers'] = $this->teacher_m->get_teacher();
				$this->data['subject'] = $this->subject_m->get_subject($id);
				//$this->data['subjectgroups'] = $this->code_m->get_order_by_code(array("codeName"=>"subjectGroup"));
				$this->data['subjectgroups'] = $this->code_m->getcodeToArray(array('codeName'=>'subjectGroup'));										
				if($this->data['subject']) {
					// $this->data['set'] = $url;
					if($_POST) {
						$this->data["teacherIDs"] = $this->input->post("teacherIDs_input");
						$rules = $this->rules();
						$this->form_validation->set_rules($rules);
						if ($this->form_validation->run() == FALSE) {
							$this->data['form_validation'] = validation_errors(); 
							$this->data["subview"] = "subject/edit";
							$this->load->view('_layout_main', $this->data);			
						} else {
							// $teacher = $this->teacher_m->get_teacher($this->input->post("teacherID"));
							$array = array(
								// "classesID" => $this->input->post("classesID"),
								"subject" => $this->input->post("subject"),
								"subject_author" => $this->input->post("subject_author"),
								"subjectGroup" => $this->input->post("subject_group"),
								"subject_code" => $this->input->post("subject_code"),
								"amount" => $this->input->post("amount"),
								// "teacher_name" => $teacher->name,
								"modify_date" => date("Y-m-d h:i:s")
							);
							$this->subject_m->update_subject($array, $id);
							$this->insert_subject_teacher_details($id);
							$this->session->set_flashdata('success', $this->lang->line('menu_success'));
							redirect(base_url("subject/index/$url"));
						}
					} else {
						$this->data["subview"] = "subject/edit";
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

	private function insert_subject_teacher_details($id){
		$subject_teacher_details_input = $this->input->post("teacherIDs_input");
		$this->subject_teacher_details_m->delete_by_subjectID($id);
		if($subject_teacher_details_input){
			foreach ($subject_teacher_details_input as $value) {
				$teacher = $this->teacher_m->get($value);
				if($teacher){
					$subject_teacher_details = array(
						"subjectID" => $id,
						"teacherID" => $value,
						"name" => $teacher->name
					);
				}
				$this->subject_teacher_details_m->insert($subject_teacher_details);
			}
		}
	}

	public function delete() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" || $usertype == "TeacherManager") {
			$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			// $url = htmlentities(mysql_real_escape_string($this->uri->segment(4)));
			if((int)$id) {
				$this->subject_m->delete_subject($id);
				$this->session->set_flashdata('success', $this->lang->line('menu_success'));
				redirect(base_url("subject/index"));
			} else {
				redirect(base_url("subject/index"));
			}	
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	public function unique_subject() {
		$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
		if((int)$id) {
			$subject = $this->subject_m->get_order_by_subject(array("subject" => $this->input->post("subject"), "subjectID !=" => $id));
			if(count($subject)) {
				$this->form_validation->set_message("unique_subject", "%s already exists");
				return FALSE;
			}
			return TRUE;
		} else {
			$subject = $this->subject_m->get_order_by_subject(array("subject" => $this->input->post("subject")));

			if(count($subject)) {
				$this->form_validation->set_message("unique_subject", "%s already exists");
				return FALSE;
			}
			return TRUE;
		}	
	}

	public function unique_subject_code() {
		$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
		if((int)$id) {
			$subject = $this->subject_m->get_order_by_subject(array("subject_code" => $this->input->post("subject_code"), "subjectID !=" => $id));
			if(count($subject)) {
				$this->form_validation->set_message("unique_subject_code", "%s already exists");
				return FALSE;
			}
			return TRUE;
		} else {
			$subject = $this->subject_m->get_order_by_subject(array("subject_code" => $this->input->post("subject_code")));

			if(count($subject)) {
				$this->form_validation->set_message("unique_subject_code", "%s already exists");
				return FALSE;
			}
			return TRUE;
		}	
	}

	public function subject_list() {
		$classID = $this->input->post('id');
		if((int)$classID) {
			$string = base_url("subject/index/$classID");
			echo $string;
		} else {
			redirect(base_url("subject/index"));
		}
	}

	public function student_list() {
		$studentID = $this->input->post('id');
		if((int)$studentID) {
			$string = base_url("subject/index/$studentID");
			echo $string;
		} else {
			redirect(base_url("subject/index"));
		}
	}

	function allclasses() {
		if($this->input->post('classesID') == 0) {
			$this->form_validation->set_message("allclasses", "The %s field is required");
	     	return FALSE;
		}
		return TRUE;
	}

	public function allteacher() {
		if($this->input->post('teacherID') === '0') {

			$this->form_validation->set_message("allteacher", "The %s field is required");
	     	return FALSE;
		}
		return TRUE;
	}

	function valid_number() {
		if($this->input->post('amount') < 0) {
			$this->form_validation->set_message("valid_number", "%s is invalid number");
			return FALSE;
		}
		return TRUE;
	}
}

/* End of file subject.php */
/* Location: .//D/xampp/htdocs/school/mvc/controllers/subject.php */