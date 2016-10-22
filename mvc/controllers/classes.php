<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Classes extends Admin_Controller {
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
		$this->load->model("classes_m");
		$this->load->model("subject_m");
		$this->load->model("course_details_m");
		$language = $this->session->userdata('lang');
		$this->lang->load('classes', $language);
		$this->data['subjects'] = $this->subject_m->get_subject();
	}

	public function index() {
		$usertype = $this->session->userdata("usertype");
 		if($usertype == "Admin" || $usertype == "TeacherManager" ) {
			$this->data['classes'] = $this->classes_m->get_join_classes();
			$this->data["subview"] = "classes/index";
			$this->load->view('_layout_main', $this->data);
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	protected function rules() {
		$rules = array(
			array(
				'field' => 'classes',
				'label' => $this->lang->line("classes_name"),
				'rules' => 'trim|required|xss_clean|max_length[60]|callback_unique_classes'
			),
			array(
				'field' => 'amount',
				'label' => $this->lang->line("classes_amount"),
				'rules' => 'trim|required|numeric|max_length[11]|xss_clean|callback_valid_number'
			),
			array(
				'field' => 'note',
				'label' => $this->lang->line("classes_note"),
				'rules' => 'trim|max_length[200]|xss_clean'
			)
		);
		return $rules;
	}

	public function add() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" || $usertype == "TeacherManager") {
			$this->data["category"] = $this->input->post("category");
			if($_POST) {
				$this->data["subjectIDs"] = $this->input->post("subjects_input");
				$rules = $this->rules();
				$this->form_validation->set_rules($rules);
				if ($this->form_validation->run() == FALSE) {
					$this->data["subview"] = "classes/add";
					$this->load->view('_layout_main', $this->data);
				} else {
					$array = array(
						"classes" => $this->input->post("classes"),
						"teacherID" => "0",
						"amount" => $this->input->post("amount"),
						"note" => $this->input->post("note"),
						"create_date" => date("Y-m-d h:i:s"),
						"modify_date" => date("Y-m-d h:i:s"),
						"create_userID" => $this->session->userdata('loginuserID'),
						"create_username" => $this->session->userdata('username'),
						"create_usertype" => $this->session->userdata('usertype')
					);
					
					if($this->input->post("category")){
						$array['category'] = $this->input->post("category");
					}else{
						$array['category'] = NULL;
					}
					$id = $this->classes_m->insert_classes($array);
					if($id){
						$this->insert_course_details($id);
					}
					$this->session->set_flashdata('success', $this->lang->line('menu_success'));
					redirect(base_url("classes/index"));
				}
			} else {
				$this->data["subview"] = "classes/add";
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
			if((int)$id) {
				$this->data['classes'] = $this->classes_m->get_classes($id);
				if($this->data['classes']) {
					if($_POST) {
						$this->data["subjectIDs"] = $this->input->post("subjects_input");
						$rules = $this->rules();
						$this->form_validation->set_rules($rules);
						if ($this->form_validation->run() == FALSE) {
							$this->data['classes']->category = $this->input->post("category");
							$this->data["subview"] = "classes/edit";
							$this->load->view('_layout_main', $this->data);
						} else {
							$array = array(
								"classes" => $this->input->post("classes"),
								"teacherID" => "0",
								"amount" => $this->input->post("amount"),
								"note" => $this->input->post("note"),
								"modify_date" => date("Y-m-d h:i:s")
							);
							if($this->input->post("category")){
								$array['category'] = $this->input->post("category");
							}else{
								$array['category'] = NULL;
							}
							$this->insert_course_details($id);

							$this->classes_m->update_classes($array, $id);
							$this->session->set_flashdata('success', $this->lang->line('menu_success'));
							redirect(base_url("classes/index"));
						}
					} else {
						$this->data["subview"] = "classes/edit";
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

	private function insert_course_details($id){
		$course_details_input = $this->input->post("subjects_input");
		$this->course_details_m->delete_by_classID($id);
		if($course_details_input){
			foreach ($course_details_input as $value) {
				$subject = $this->subject_m->get($value);
				if($subject){
					$course_details = array(
						"classesID" => $id,
						"subjectID" => $value,
						"subject_name" => $subject->subject
					);
				}
				$this->course_details_m->insert($course_details);
			}
		}
	}

	public function delete() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" || $usertype == "TeacherManager" ) {
			$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			if((int)$id) {
				$this->classes_m->delete_classes($id);
				$this->session->set_flashdata('success', $this->lang->line('menu_success'));
				redirect(base_url("classes/index"));
			} else {
				redirect(base_url("classes/index"));
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	public function unique_classes() {
		$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
		if((int)$id) {
			$classes = $this->classes_m->get_order_by_classes(array("classes" => $this->input->post("classes"), "classesID !=" => $id));
			if(count($classes)) {
				$this->form_validation->set_message("unique_classes", "%s already exists");
				return FALSE;
			}
			return TRUE;
		} else {
			$classes = $this->classes_m->get_order_by_classes(array("classes" => $this->input->post("classes")));

			if(count($classes)) {
				$this->form_validation->set_message("unique_classes", "%s already exists");
				return FALSE;
			}
			return TRUE;
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

/* End of file class.php */
/* Location: .//D/xampp/htdocs/school/mvc/controllers/class.php */
