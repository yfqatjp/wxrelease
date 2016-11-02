<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends Admin_Controller {
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
	function __construct () {
		parent::__construct();
		$this->load->model("student_m");
		$this->load->model("student_custom_course_m");
		$this->load->model("user_m");
		$this->load->model("classes_m");
		$this->load->model("invoice_m");
		$this->load->model("code_m");
		$this->load->model('payment_m');
		$this->load->model("evaluation_m");
		$this->load->model("subject_m");
		$this->load->model("course_details_m");
		$this->load->model("reset_m");
		$this->load->model("teacher_m");
		$this->load->library("email");
	
		$language = $this->session->userdata('lang');
		$this->lang->load('student', $language);
		$this->lang->load('invoice', $language);
		$this->data['salesmans'] = $this->teacher_m->get_teacher_type_all(array('Salesman','Receptionist','TeacherManager'));
		$this->data['subjects'] = $this->subject_m->get_subject();
	}

	public function index() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" || $usertype == "TeacherManager" || $usertype == "Salesman"|| $usertype == "Receptionist") {
			
			//检索条件，学生状态
			$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			
			//$id = $this->input->post('id');
			//$category = $this->input->post('category');
			$category = $this->session->userdata("searchCategory");
			$source = $this->session->userdata("searchSource");
			$source_memo = $this->session->userdata("searchSource_memo");
			$possibility = $this->session->userdata("searchPossibility");
			$paymentflag = $this->session->userdata("searchPaymentflag");
			$studentstate = $this->session->userdata("searchstudentstate");
			$querystring = $this->session->userdata("querystring");
			$salesman_list = $this->session->userdata("salesman_list");
			$class_list = $this->session->userdata("class_list");
			//$this->data['studentSource_list'] = $this->code_m->get_order_by_code(array('loadflag'=>"1",'codeName'=>"studentSource"));
			
			if((int)$id) {
				$this->data['set'] = $id;
				$this->data['category'] = $category;
				$this->data['source'] = $source;
				$this->data['source_memo'] = $source_memo;
				$this->data['possibility'] = $possibility;
				$this->data['paymentflag'] = $paymentflag;				
				$this->data['classes'] = $this->student_m->get_classes_join();
				$this->data['studentstate'] = $studentstate;
				$this->data['querystring'] = $querystring;

				if($salesman_list){
					$this->data['salesman_list'] = $salesman_list;
				}else{
					$this->data['salesman_list'] = array();
				}
				if($class_list){
					$this->data['class_list'] = $class_list;
				}else{
					$this->data['class_list'] = array();
				}
				
				$this->data['students'] = $this->student_m->get_student_search($id,$category,$source,$paymentflag,$studentstate,$querystring,$source_memo,$possibility,$salesman_list,$class_list);

				if($this->data['students']) {

				} else {
					$this->data['students'] = NULL;
				}

				$this->data["subview"] = "student/index";
				$this->load->view('_layout_main', $this->data);
			} else {
				$this->data['set'] = '3';
				$this->data['classes'] = $this->student_m->get_classes();
				
				$this->data['salesman_list'] = array();
				$this->data['class_list'] = array();
				$data = array(	
						"salesman_list" => array(),	
						"class_list" => array(),		
				);
				$this->session->set_userdata($data);

				$this->data["subview"] = "student/search";
				$this->load->view('_layout_main', $this->data);
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	//规则
	protected function rules() {
		$rules = array(
			array(
				'field' => 'salesmanID',
				'label' => $this->lang->line("student_salesman"),
				'rules' => 'trim|max_length[11]|xss_clean|numeric'
			),				
			array(
				'field' => 'name',
				'label' => $this->lang->line("student_name"),
				'rules' => 'trim|required|xss_clean|max_length[60]'
			),
			array(
					'field' => 'sex',
					'label' => $this->lang->line("student_sex"),
					'rules' => 'trim|required|max_length[10]|xss_clean'
			),							
					
			array(
				'field' => 'input_date',
				'label' => $this->lang->line("student_input_date"),
				'rules' => 'trim|required|max_length[10]|callback_date_valid|xss_clean'
			),

			array(
				'field' => 'wechat',
				'label' => $this->lang->line("student_wechat"),
				'rules' => 'trim|max_length[20]|xss_clean'
			),
			array(
				'field' => 'email',
				'label' => $this->lang->line("student_email"),
				'rules' => 'trim|max_length[40]|valid_email|xss_clean|callback_unique_email'
			),
			array(
				'field' => 'phone',
				'label' => $this->lang->line("student_phone"),
				'rules' => 'trim|required|max_length[25]|min_length[5]|xss_clean'
			),
			// array(
			// 	'field' => 'address',
			// 	'label' => $this->lang->line("student_address"),
			// 	'rules' => 'trim|max_length[200]|xss_clean'
			// ),
			array(
					'field' => 'language_school',
					'label' => $this->lang->line("student_language_school"),
					'rules' => 'trim|max_length[200]|xss_clean'
			),
			array(
					'field' => 'category',
					'label' => $this->lang->line("student_category"),
					'rules' => 'trim|required|max_length[200]|xss_clean'
			),
			array(
					'field' => 'source',
					'label' => $this->lang->line("student_source"),
					'rules' => 'trim|required|max_length[200]|xss_clean'
			),	
			array(
					'field' => 'source_memo',
					'label' => $this->lang->line("student_source_memo"),
					'rules' => 'trim|required|max_length[200]|xss_clean'
			),
			array(
					'field' => 'possibility',
					'label' => $this->lang->line("student_possibility"),
					'rules' => 'trim|required|max_length[200]|xss_clean'
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
		if($usertype == "Admin" || $usertype == "TeacherManager"|| $usertype == "Salesman"|| $usertype == "Receptionist") {
			$this->data['classes'] = $this->student_m->get_classes();


			$classesID = $this->input->post("classesID");

			if($classesID != 0) {
				$this->data['sections'] = $this->section_m->get_order_by_section(array("classesID" =>$classesID));
			} else {
				$this->data['sections'] = "empty";
			}
			$this->data['sectionID'] = $this->input->post("sectionID");

			if($_POST) {
				$rules = $this->rules();
				$this->form_validation->set_rules($rules);
				if ($this->form_validation->run() == FALSE) {
					$this->data["subview"] = "student/add";
					$this->load->view('_layout_main', $this->data);
				} else {

					$sectionID = $this->input->post("sectionID");
					if($sectionID == 0) {
						$this->data['sectionID'] = 0;
					} else {
						$this->data['sections'] = $this->section_m->get_allsection($classesID);
						$this->data['sectionID'] = $this->input->post("sectionID");
					}

					$dbmaxyear = $this->student_m->get_order_by_student_single_max_year($classesID);
					$maxyear = "";
					if(count($dbmaxyear)) {
						$maxyear = $dbmaxyear->year;
					} else {
						$maxyear = date("Y");
					}

					$section = $this->section_m->get_section($sectionID);
					$array = array();
					$array["name"] = $this->input->post("name");
					$array["dob"] = date("Y-m-d", strtotime($this->input->post("dob")));
					$array["sex"] = $this->input->post("sex");
					$array["religion"] = $this->input->post("religion");
					$array["email"] = $this->input->post("email");
					$array["phone"] = $this->input->post("phone");
					$array["address"] = $this->input->post("address");
					$array["classesID"] = $this->input->post("classesID");
					$array["sectionID"] = $this->input->post("sectionID");
					$array["section"] = $section->section;
					$array["roll"] = $this->input->post("roll");
					$array["username"] = $this->input->post("username");
					$array['password'] = $this->student_m->hash($this->input->post("password"));
					$array['usertype'] = "Student";
					//父母选择转换
					if(null == ($this->input->post('guargianID'))){
						$array['parentID'] = 0;						
					}else{
						$array['parentID'] = $this->input->post('guargianID');
					}
					$array["subjectStart_date"] = date("Y-m-d", strtotime($this->input->post("subjectStartdate")));
					$array["subjectEnd_date"] = date("Y-m-d", strtotime($this->input->post("subjectEnddate")));
										
					$array['library'] = 0;
					$array['hostel'] = 0;
					$array['transport'] = 0;
					$array['create_date'] = date("Y-m-d");
					$array['year'] = $maxyear;
					$array['totalamount'] = 0;
					$array['paidamount'] = 0;
					$array["create_date"] = date("Y-m-d h:i:s");
					$array["modify_date"] = date("Y-m-d h:i:s");
					$array["create_userID"] = $this->session->userdata('loginuserID');
					//$array["create_username"] = $this->session->userdata('username');
					$array["create_username"] = $this->session->userdata('name');
					$array["create_usertype"] = $this->session->userdata('usertype');
					$array["subjectStart_date"] = date("Y-m-d", strtotime($this->input->post("subjectStartdate")));
					$array["subjectEnd_date"] = date("Y-m-d", strtotime($this->input->post("subjectEnddate")));						
					$array["studentactive"] = 1;

					$new_file = "defualt.png";
					if($_FILES["image"]['name'] !="") {
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
								$this->data["subview"] = "student/add";
								$this->load->view('_layout_main', $this->data);
							} else {
								$data = array("upload_data" => $this->upload->data());
								 $this->student_m->insert_student($array);
								$this->session->set_flashdata('success', $this->lang->line('menu_success'));
								redirect(base_url("student/index"));

							}
						} else {
							$this->data["image"] = "Invalid file";
							$this->data["subview"] = "student/add";
							$this->load->view('_layout_main', $this->data);
						}
					} else {
						$array["photo"] = $new_file;
						$this->student_m->insert_student($array);
						$this->session->set_flashdata('success', $this->lang->line('menu_success'));
						redirect(base_url("student/index"));
					}
				}
			} else {
				$this->data["subview"] = "student/add";
				$this->load->view('_layout_main', $this->data);
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	public function addcustomer() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" || $usertype == "TeacherManager"  || $usertype == "Salesman"|| $usertype == "Receptionist") {


				
			$classesID = $this->input->post("classesID");
	
			if($classesID != 0) {
			//	$this->data['sections'] = $this->section_m->get_order_by_section(array("classesID" =>$classesID));
			} else {
				$classesID　= 0;
			//	$this->data['sections'] = "empty";
			}
		//	$this->data['sectionID'] = $this->input->post("sectionID");
	
			if($_POST) {
				$rules = $this->rules();
				unset($rules[5]);
				$this->form_validation->set_rules($rules);
				if ($this->form_validation->run() == FALSE) {
					$this->data["subview"] = "student/addcustomer";
					$this->load->view('_layout_main', $this->data);
				} else {

					$section = 0;
					$array = array();					
					$array["salesmanID"] = $this->input->post("salesmanID");
					
					//对应人未输入
					if(empty($array["salesmanID"])){
						
						$array["salesmanID"] = 0;
					}
					
					$array["name"] = $this->input->post("name");
					$array["dob"] = date("Y-m-d", strtotime($this->input->post("dob")));
					$array["sex"] = $this->input->post("sex");
					$array["religion"] = $this->input->post("religion");
					$array["email"] = $this->input->post("email");
					$array["wechat"] = $this->input->post("wechat");
					$array["phone"] = $this->input->post("phone");
					$array["address"] = $this->input->post("address");
					$array["category"] = $this->input->post("category");
					$array["source"] = $this->input->post("source");
					if($array["source"] == 3){
						$array["source_memo"] = $this->input->post("source_partner");								
					}else{
						$array["source_memo"] = $this->input->post("source_memo");
					}	

					$array["possibility"] = $this->input->post("possibility");
					$array["language_school"] = $this->input->post("language_school");
					//未报名学生状态为1
					$array["classesID"] = 1;
					$array["sectionID"] = $this->input->post("sectionID");
					$array["section"] = 0;
					$array["roll"] = "";
					$array["username"] = "";
					$array['password'] = "";
					$array['usertype'] = "Student";
					//父母选择转换
                	$array['parentID'] = 0;                	
					$array["subjectStart_date"] = null;
					$array["subjectEnd_date"] = null;
	
					$array['library'] = 0;
					$array['hostel'] = 0;
					$array['transport'] = 0;
					$array['input_date'] = date("Y-m-d", strtotime($this->input->post("input_date")));
					//$array['year'] = $maxyear;
					$array['year'] = 2014;
					$array['totalamount'] = 0;
					$array['paidamount'] = 0;
					$array["create_date"] = date("Y-m-d h:i:s");
					$array["modify_date"] = date("Y-m-d h:i:s");
					$array["create_userID"] = $this->session->userdata('loginuserID');
					$array["create_username"] = $this->session->userdata('name');
					//$array["create_username"] = $this->session->userdata('username');
					$array["create_usertype"] = $usertype;

					$array["graduated_school"] = $this->input->post("graduated_school");
					$array["latest_education"] = $this->input->post("latest_education");

					$array["studentactive"] = 0;
	
					$new_file = "defualt.png";
					if($_FILES["image"]['name'] !="") {
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
								$this->data["subview"] = "student/addcustomer";
								$this->load->view('_layout_main', $this->data);
							} else {
								$data = array("upload_data" => $this->upload->data());
								$id = $this->student_m->insert_student($array);
								$this->session->set_flashdata('success', $this->lang->line('menu_success'));
								//redirect(base_url("student/index"));
								redirect(base_url("student/view/$id/1"));
							}
						} else {
							$this->data["image"] = "Invalid file";
							$this->data["subview"] = "student/addcustomer";
							$this->load->view('_layout_main', $this->data);
						}
					} else {
						$array["photo"] = $new_file;
						$id = $this->student_m->insert_student($array);
						$this->session->set_flashdata('success', $this->lang->line('menu_success'));
						//redirect(base_url("student/index"));
						redirect(base_url("student/view/$id/1"));
					}
				}
			} else {
				$this->data["subview"] = "student/addcustomer";
				$this->load->view('_layout_main', $this->data);
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}	

	private function add_class($amount, $student_name){
		$array = array(
			"classes" => "自定义套餐_".$student_name,
			"teacherID" => "0",
			"amount" => $amount,
			"note" => "自定义套餐_".$student_name,
			"class_type" => "1",
			"create_date" => date("Y-m-d h:i:s"),
			"modify_date" => date("Y-m-d h:i:s"),
			"create_userID" => $this->session->userdata('loginuserID'),
			"create_username" => $this->session->userdata('username'),
			"create_usertype" => $this->session->userdata('usertype')
		);
		$id = $this->classes_m->insert_classes($array);
		return $id;
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
	
	public function edit() {
		$usertype = $this->session->userdata("usertype");
		$updateStudentFlag = false;
		if($usertype == "Admin" || $usertype == "TeacherManager"  || $usertype == "Salesman"|| $usertype == "Receptionist"|| $usertype == "Student") {
			$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			$url = htmlentities(mysql_real_escape_string($this->uri->segment(4)));
			
				
			if((int)$id && (int)$url) {

				$this->data['classes'] = $this->student_m->get_classes_join();
				$this->data['student'] = $this->student_m->get_student($id);
				$state = htmlentities(mysql_real_escape_string($this->uri->segment(5)));
				
				if($state != null && isset($state)){
					$this->data['state'] = $state;				
				}

				$classesID = $this->data['student']->classesID;

				//$this->data['sections'] = $this->section_m->get_order_by_section(array('classesID' => $classesID));
				
				$this->data['set'] = $url;
				if($this->data['student']) {
					if($_POST) {
						$rules = $this->rules();
						//将部分检查规则清空
						if($usertype == "Student"){
							unset($rules[0],$rules[3], $rules[9],$rules[10],$rules[11]);
						}
						$input_classesID = $this->input->post('classesID');
						$input_subjects = $this->input->post("subjects_input");
						$this->data['subjects_input'] = $input_subjects;
						if($input_subjects || ($input_classesID && $input_classesID <> '1' && $usertype <> "Student") || (isset($state) && $state == "join")){
							if(!$input_subjects){
								array_push($rules,array(
										'field' => 'classesID',
										'label' => $this->lang->line("student_classes"),
										'rules' => 'trim|required|numeric|max_length[11]|xss_clean|callback_unique_classesID'
									)
								);
							}
							array_push($rules,array(
									'field' => 'subjectStartdate',
									'label' => $this->lang->line("student_subjectStartdate"),
									'rules' => 'trim|required|max_length[10]|callback_date_valid|xss_clean'
								),
								array(
									'field' => 'subjectEnddate',
									'label' => $this->lang->line("student_subjectStartdate"),
									'rules' => 'trim|required|max_length[10]|callback_date_valid|xss_clean'
								),
								array(
									'field' => 'fee_remission_amount',
									'label' => $this->lang->line("student_fee_remission"),
									'rules' => 'trim|numeric|xss_clean'
								)
							);
							
							if(isset($state) && $state == "join"){
								array_push($rules,array(
								'field' => 'amount',
								'label' => $this->lang->line("student_amount"),
								'rules' => 'trim|required|numeric|xss_clean'
								)
								);									
							}
							
							
							if($this->input->post("fee_remission_amount")){
								array_push($rules,array(
										'field' => 'fee_remission_note',
										'label' => $this->lang->line("student_fee_remission_note"),
										'rules' => 'trim|required|xss_clean'
									)
								);
							}
						}
						$this->form_validation->set_rules($rules);
						if ($this->form_validation->run() == FALSE) {
							$this->data["subview"] = "student/edit";
							$this->load->view('_layout_main', $this->data);
						} else {
							// 学生自定义套餐有无判断
							$custom_course_array = $this->student_custom_course_m->get_order_by_student_custom_course(array('studentID' => $id));
							// 输入自定义课程的场合
							if($input_subjects){
								$this->classes_m->get_order_by_classes(array('class_type' => '1', ));
								if(isset($custom_course_array) && count($custom_course_array) <= 0){
									$amount = $this->input->post("amount");
									$custom_classesID = $this->add_class($amount, $this->input->post("name"));
									if(!$input_classesID){
										$input_classesID = $custom_classesID;
									}
									// 不存在自定义套餐的场合，插入新记录
									$this->student_custom_course_m->insert_student_custom_course(array('studentID' => $id, 'classesID' => $custom_classesID));
								}
								if($custom_classesID){
									$this->insert_course_details($custom_classesID);
								}
							}else{
								// 没有自定义课程的场合，清空
								if(isset($custom_course_array) && count($custom_course_array) > 0){
									$custom_classesID = $custom_course_array[0]->classesID;
									$this->classes_m->delete_classes($custom_classesID);
									$this->course_details_m->delete_by_classID($custom_classesID);
									$this->student_custom_course_m->delete_student_custom_course($custom_course_array[0]->student_custom_courseID);
								}
							}

							$array = array();
							$array["salesmanID"] = $this->input->post("salesmanID");
							//对应人未输入
							if(empty($array["salesmanID"])){
							
								$array["salesmanID"] = 0;
							}							
							
							$array["name"] = $this->input->post("name");
							$array["dob"] = date("Y-m-d", strtotime($this->input->post("dob")));
							$array["sex"] = $this->input->post("sex");
							$array["religion"] = $this->input->post("religion");
							$array["email"] = $this->input->post("email");
							$array["phone"] = $this->input->post("phone");
							$array["address"] = $this->input->post("address");
							$array["wechat"] = $this->input->post("wechat");
							$array["phone"] = $this->input->post("phone");
							$array["address"] = $this->input->post("address");
							$array["category"] = $this->input->post("category");
							$array["source"] = $this->input->post("source");
							$array["possibility"] = $this->input->post("possibility");
														
							if($array["source"] == 3){
								$array["source_memo"] = $this->input->post("source_partner");								
							}else{
								$array["source_memo"] = $this->input->post("source_memo");
							}							
							$array["language_school"] = $this->input->post("language_school");							
							
							if($input_classesID != null){
								$array["classesID"] = $input_classesID;
								$array["subjectStart_date"] = date("Y-m-d", strtotime($this->input->post("subjectStartdate")));;
								$array["subjectEnd_date"] = date("Y-m-d", strtotime($this->input->post("subjectEnddate")));;
							
							}
							

							$array["roll"] = $this->input->post("roll");
							//父母选择转换
							if(null == ($this->input->post('guargianID'))){
								$array['parentID'] = 0;
							}else{
								$array['parentID'] = $this->input->post('guargianID');
							}							
							$array['input_date'] = date("Y-m-d", strtotime($this->input->post("input_date")));
							$array["modify_date"] = date("Y-m-d h:i:s");

							$array["graduated_school"] = $this->input->post("graduated_school");
							$array["latest_education"] = $this->input->post("latest_education");

							if($_FILES["image"]['name'] !="") {
								if($this->data['student']->photo != 'defualt.png') {
									unlink(FCPATH.'uploads/images/'.$this->data['student']->photo);
								}
								$file_name = $_FILES["image"]['name'];
								$file_name_rename = $this->insert_with_image($this->data['student']->username);
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
										$this->data["subview"] = "student/edit";
										$this->load->view('_layout_main', $this->data);
									} else {
										$data = array("upload_data" => $this->upload->data());
										$this->student_m->update_student($array, $id);
										
										$updateStudentFlag = true;
										
										//$this->session->set_flashdata('success', $this->lang->line('menu_success'));
										//redirect(base_url("student/index/$url"));
									}
								} else {
									$this->data["image"] = "Invalid file";
									$this->data["subview"] = "student/edit";
									$this->load->view('_layout_main', $this->data);
								}
							} else {
								$this->student_m->update_student($array, $id);
								$updateStudentFlag = true;
								
								//$this->session->set_flashdata('success', $this->lang->line('menu_success'));
								//redirect(base_url("student/index/$url"));
							}
							
							if($updateStudentFlag){
								
								//添加学费处理
								if($state == "join"){
									$classesID = $input_classesID;
									$getclasses = $this->classes_m->get_classes($classesID);

									$getstudent = $this->student_m->get_student($id);
									$amount = $this->input->post("amount");								
									//$amount = 5000;
									$array = array(
											'classesID' => $classesID,
											'classes' => $getclasses->classes,
											'studentID' => $id,
											'student' => $getstudent->name,
											'roll' => $getstudent->roll,
											'feetype' => "学费",
											'amount' => $amount,
											'status' => 0,
											'date' => date("Y-m-d"),
											'year' => date('Y')
									);

									$invoiceID = $this->invoice_m->insert_invoice($array);
									if($invoiceID){
										$fee_remission_amount = $this->input->post("fee_remission_amount");	
										if($fee_remission_amount){
											
											$amount =  $amount - $fee_remission_amount;
											
											$fee_remission_note = $this->input->post("fee_remission_note");
											$payment_array = array(
												"invoiceID" => $invoiceID,
												"studentID"	=> $getstudent->studentID,
												"paymentamount" => $fee_remission_amount,
												"paymenttype" => '减免学费',
												"paymentdate" => date('Y-m-d'),
												"paymentmonth" => date('M'),
												"paymentyear" => date('Y'),
												"paymentnote"	=> $fee_remission_note,
												"principal"	=> $this->session->userdata("name"),
												"paymentclass"	=> '1'
											);

											$this->payment_m->insert_payment($payment_array);
											
											$this->student_m->update_student(array('totalamount' => $amount), $getstudent->studentID);
											
											$array = array(
												"amount" => $amount,
												"paiddate" => date('Y-m-d')
											);
											$this->invoice_m->update_invoice($array, $invoiceID);
										}
									}
	
									$oldamount = $getstudent->totalamount;
									$nowamount = $oldamount+$amount;
									$this->student_m->update_student(array('totalamount' => $nowamount), $getstudent->studentID);

									
								}								
								$this->session->set_flashdata('success', $this->lang->line('menu_success'));
								//redirect(base_url("student/index/$url"));
						        redirect(base_url("student/view/$id/"));
							}
						}
					} else {
						$this->data["subview"] = "student/edit";
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

	public function view() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" || $usertype == "TeacherManager" || $usertype == "Salesman"|| $usertype == "Receptionist" || $usertype == "Student") {
			$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			// $url = htmlentities(mysql_real_escape_string($this->uri->segment(4)));
			if ((int)$id) {
				$this->data["student"] = $this->student_m->get_student($id);
				$this->data["evaluations"] = $this->evaluation_m->get_order_by_evaluation(array('studentID' => $id));
				if($this->data["student"]) {				
					$this->data["class"] = $this->student_m->get_class($this->data['student']->classesID);
					$this->data['set'] = $this->data['student']->classesID;

					
					
					$this->data["invoice"] = $this->invoice_m->get_single_invoice(array('studentID' => $id));
					
					$this->data["subview"] = "student/view";
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


	public function delete() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin") {
			$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			$url = htmlentities(mysql_real_escape_string($this->uri->segment(4)));
			if ((int)$id && (int)$url) {
				$this->data['student'] = $this->student_m->get_student($id);
				if($this->data['student']) {
					if($this->data['student']->photo != 'defualt.png') {
						unlink(FCPATH.'uploads/images/'.$this->data['student']->photo);
					}
					$this->student_m->delete_student($id);
					$this->session->set_flashdata('success', $this->lang->line('menu_success'));
					redirect(base_url("student/index/$url"));
				} else {
					redirect(base_url("student/index"));
				}
			} else {
				redirect(base_url("student/index/$url"));
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	public function deleteEvaluation() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" || $usertype == "TeacherManager") {
			$studentID = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			$url = htmlentities(mysql_real_escape_string($this->uri->segment(4)));
			$id = htmlentities(mysql_real_escape_string($this->uri->segment(5)));			
			if ((int)$studentID && (int)$id && (int)$url) {
				$this->data['evaluation'] = $this->evaluation_m->get_evaluation($id);
				if($this->data['evaluation']) {
					$this->evaluation_m->delete_evaluation($id);
					
					$this->data["student"] = $this->student_m->get_student($studentID);
					
					if($this->data["student"]) {
						//计数累加
						$this->student_m->update_student(array('evaluationCount' => $this->data["student"]->evaluationCount - 1), $studentID);						
					}	
														
					$this->session->set_flashdata('success', $this->lang->line('deleteEvaluation_success'));
					redirect(base_url("student/view/$studentID/$url"));
				} else {
					redirect(base_url("student/view/$studentID/$url"));
				}
			} else {
					redirect(base_url("student/view/$studentID/$url"));
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}	

	public function addEvaluation() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" || $usertype == "TeacherManager" || $usertype == "Salesman"|| $usertype == "Receptionist") {
			$array = array();
			$studentID = $this->input->post('studentID');
			$array["studentID"] = $studentID;
			
			$array["evaluation"] = $this->input->post("evaluation");
			$evaluationID = $this->input->post("evaluationID");			
			$array["student"] = "";
			$array['modify_date'] = date("Y-m-d");
			$array["createusername"] = $this->session->userdata("name");
	
			$this->data["student"] = $this->student_m->get_student($studentID);
			if($this->data["student"]) {
				//添加
				if($evaluationID==""){
					$array['create_date'] = date("Y-m-d");
					//添加评论
					$this->evaluation_m->insert_evaluation($array);
					//计数累加
					$this->student_m->update_student(array('evaluationCount' => $this->data["student"]->evaluationCount + 1), $studentID);
						
					$this->session->set_flashdata('success', $this->lang->line('addEvaluation_success'));															
				}else{
					//编辑
					$this->evaluation_m->update_evaluation($array, $evaluationID);
					$this->session->set_flashdata('success', $this->lang->line('editEvaluation_success'));
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
	
	
	public function unique_roll() {
		$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
		if((int)$id) {
			$student = $this->student_m->get_order_by_roll(array("roll" => $this->input->post("roll"), "studentID !=" => $id, "classesID" => $this->input->post('classesID')));
			if(count($student)) {
				$this->form_validation->set_message("unique_roll", $this->lang->line('student_already_exists'));
				return FALSE;
			}
			return TRUE;
		} else {
			$student = $this->student_m->get_order_by_roll(array("roll" => $this->input->post("roll"), "classesID" => $this->input->post('classesID')));

			if(count($student)) {
				//$this->form_validation->set_message("unique_roll", $this->lang->line('student_already_exists'));
				$this->form_validation->set_message("unique_roll", $lang['student_already_exists']);
				return FALSE;
			}
			return TRUE;
		}
	}

	public function lol_username() {
		$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
		if((int)$id) {
			$student_info = $this->student_m->get_single_student(array('studentID' => $id));
			$tables = array('student' => 'student', 'teacher' => 'teacher');
			$array = array();
			$i = 0;
			foreach ($tables as $table) {
				$user = $this->student_m->get_username($table, array("username" => $this->input->post('username'), "email !=" => $student_info->email));
				if(count($user)) {
					$this->form_validation->set_message("lol_username", $this->lang->line('student_already_exists'));
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
			$tables = array('student' => 'student', 'teacher' => 'teacher');
			$array = array();
			$i = 0;
			foreach ($tables as $table) {
				$user = $this->student_m->get_username($table, array("username" => $this->input->post('username')));
				if(count($user)) {
					$this->form_validation->set_message("lol_username", $this->lang->line('student_already_exists'));
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

	public function unique_classesID() {
		if($this->input->post('classesID') == 0) {
			$this->form_validation->set_message("unique_classesID", "The %s field is required");
	     	return FALSE;
		}
		return TRUE;
	}

	public function unique_sectionID() {
		if($this->input->post('sectionID') == 0) {
			$this->form_validation->set_message("unique_sectionID", "The %s field is required");
	     	return FALSE;
		}
		return TRUE;
	}

	//报名时检查必填项目
	public function check_enroll() {
		if($this->input->post('classesID') != 0 ||
		   $this->input->post('sectionID') != 0 ||
	       $this->input->post('subjectEnddate') != null ||
		   $this->input->post('subjectStartdate') != null	) {
			
			if($this->input->post('classesID') != 0 &&
			   $this->input->post('sectionID') != 0  &&
		       $this->input->post('subjectEnddate') != null  &&
			   $this->input->post('subjectStartdate') != null	) {
				
				return TRUE;
				
			}else{
				$this->form_validation->set_message("check_enroll", "报名操作时，必须输入套餐，分组，课程开始时间，课程终了时间！");
				return FALSE;				
			}
		}
		return TRUE;
	}	
	
	public function student_list() {
		$classID = $this->input->post('id');
		$category = $this->input->post('category');
		$source = $this->input->post('source');
		$source_memo = $this->input->post('source_memo');
		$possibility = $this->input->post('possibility');
		$paymentflag = $this->input->post('paymentflag');
		$studentstate = $this->input->post('studentstate');
		$querystring = $this->input->post('querystring');
		$salesman_list = $this->input->post('salesman_list');
		$class_list = $this->input->post('class_list');
						
		$data = array(
				"searchCategory" => $category,
				"searchSource" => $source,
				"searchSource_memo" => $source_memo,
				"searchPossibility" => $possibility,
				"searchPaymentflag" => $paymentflag,
				"searchstudentstate" => $studentstate,		
				"querystring" => $querystring,	
				"salesman_list" => $salesman_list,	
				"class_list" => $class_list,		
		);
		$this->session->set_userdata($data);
		
		if((int)$classID) {
			$string = base_url("student/index/$classID");
			echo $string;
		} else {
			redirect(base_url("student/index"));
		}
	}

	public function unique_email() {
		$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
		if((int)$id) {
			$student_info = $this->student_m->get_single_student(array('studentID' => $id));
			$tables = array('student' => 'student', 'teacher' => 'teacher');
			$array = array();
			$i = 0;
			foreach ($tables as $table) {
				$user = $this->student_m->get_username($table, array("email" => $this->input->post('email'), 'username !=' => $student_info->username ));
				if(count($user)) {
					$this->form_validation->set_message("unique_email", $this->lang->line('student_already_exists'));
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
			$tables = array('student' => 'student', 'teacher' => 'teacher');
			$array = array();
			$i = 0;
			foreach ($tables as $table) {
				$user = $this->student_m->get_username($table, array("email" => $this->input->post('email')));
				if(count($user)) {
					//$this->form_validation->set_message("unique_email", $this->lang->line('student_already_exists'));
					$this->form_validation->set_message("unique_email", $this->lang->line('student_already_exists'));
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

	function sectioncall() {
		$classesID = $this->input->post('id');
		if((int)$classesID) {
			$allsection = $this->section_m->get_order_by_section(array('classesID' => $classesID));
			echo "<option value='0'>", $this->lang->line("student_select_section"),"</option>";
			foreach ($allsection as $value) {
				echo "<option value=\"$value->sectionID\">",$value->section,"</option>";
			}
		}
	}

	function get_course_details_by_classID(){
		$classesID = $this->input->post('id');
		$course_details = $this->course_details_m->get_by_classID($classesID);
		foreach($course_details as $item) { 
			$subject = $this->subject_m->get($item->subjectID);
			echo "<button type='button' class='btn btn-success btn-xs' style='margin: 5px'>".
				$subject->subject."</button>"; 
		}
	}

	function get_course_amount(){
		$classesID = $this->input->post('id');
		$classes = $this->classes_m->get_classes($classesID);
		if($classes){
			echo $classes->amount;
		}else{
			echo 0;
		}
		
	}
	

	function get_amount(){
		$subjects = $this->input->post('subjects');
		$amount = 0;
		if($subjects){
			foreach ($subjects as $key => $value) {
				if($value){
					$subject = $this->subject_m->get_subject($key);
					if($subject){
						$amount += $subject->amount;
					}
				}
			}
		}
		echo $amount;
	}


	
	
	
	function active() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" || $usertype == "TeacherManager") {
			$id = $this->input->post('id');
			$status = $this->input->post('status');
			if($id != '' && $status != '') {
				if((int)$id) {
					if($status == 'chacked') {
						$student = $this->student_m->get_student($id);
						
						$this->student_m->update_student(array('studentactive' => 1), $id);
						$flag = $this->reset_m->resetURLSend($student->email,"ACTIVE");
						
						if($flag == 1){
							echo 'Success';
						}elseif($flag==3){
							echo 'Error';
						}else{
							echo 'Error';
						}
							
					} elseif($status == 'unchacked') {
						$this->student_m->update_student(array('studentactive' => 0), $id);
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
}

/* End of file student.php */
/* Location: .//D/xampp/htdocs/school/mvc/controllers/student.php */
