<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tattendance extends Admin_Controller {
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
		$this->load->model("tattendance_m");
		$this->load->model("teacher_m");
		$this->load->model("wage_m");
		$language = $this->session->userdata('lang');
		$this->lang->load('tattendance', $language);
		$this->load->model("classes_m");
		$this->load->model("student_info_m");

		$this->load->model("subject_m");
		$this->load->model("course_details_m");
		$this->load->model('student_m');
		$this->load->model("teacher_transport_m");
	}

	protected function rules() {
		$rules = array(
			array(
				'field' => 'teacherID',
				'label' => $this->lang->line("tattendance_teacher"),
				'rules' => 'trim|required|xss_clean'
			),
			array(
				'field' => 'date',
				'label' => $this->lang->line("tattendance_date"),
				'rules' => 'trim|required|max_length[10]|xss_clean|callback_date_valid|callback_valid_future_date'
			),
			array(
					'field' => 'start_time',
					'label' => $this->lang->line("tattendance_start_time"),
					'rules' => 'trim|required|xss_clean|max_length[10]|callback_check_start_time'
			),				
			array(
				'field' => 'start_time',
				'label' => $this->lang->line("tattendance_start_time"),
				'rules' => 'trim|required|xss_clean|max_length[10]|callback_check_start_time'
			),
			array(
				'field' => 'end_time',
				'label' => $this->lang->line("tattendance_end_time"),
				'rules' => 'trim|required|xss_clean|max_length[10]|callback_check_end_time'
			),
			array(
					'field' => 'tattendance_type',
					'label' => $this->lang->line("tattendance_type"),
					'rules' => 'trim|required|xss_clean'
			),
			array(
					'field' => 'TE_select',
					'label' => $this->lang->line("TE_select"),
					'rules' => 'trim|required|xss_clean'
			),	
			array(
					'field' => 'TE_Amount',
					'label' => $this->lang->line("TE_Amount"),
					'rules' => 'trim|required|xss_clean'
			),
			array(
					'field' => 'TE_note',
					'label' => $this->lang->line("TE_note"),
					'rules' => 'trim|required|xss_clean'
			),
			array(
					'field' => 'TE_wage',
					'label' => $this->lang->line("TE_wage"),
					'rules' => 'trim|numeric|xss_clean'
			),						
		);
		return $rules;
	}

	public function index() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" || $usertype == "TeacherManager" ) {
			if($_POST) {
				$this->data['date_from'] = $this->input->post("date_from");
				$this->data['date_to'] = $this->input->post("date_to");
				$this->data['teacher_type'] = $this->input->post("teacherType");
				$this->data['verify_status'] = $this->input->post("verify_status");

				if($usertype == "Teacher" || $usertype == "TeacherManager" || $usertype == "Receptionist"|| $usertype == "Salesman"){
				//	$this->data['teachers'] = array($this->teacher_m->get_teacher($this->session->userdata("loginuserID")));
				}else{
				/*	if($this->data['teacher_type']){
						$this->data['teachers'] = $this->teacher_m->get_order_by_teacher(array("teachertype"=>$this->data['teacher_type']));
					}else{
						$this->data['teachers'] = $this->teacher_m->get_teacher();
					}*/
				}
				
				$where = array();
				$where["date >="] = "'".$this->data['date_from']."'";
				$where["date <="] = "'".$this->data['date_to']."'";
				
				if($this->data['teacher_type'] != ""){
					$where["teachertype ="] = "'".$this->data['teacher_type']."'";
				}
				
				//$where["teachertype ="] = $this->data['teacher_type'];								
				
				// $data = array(
				// 		"date >= " => $this->data['date_from'],
				// 		"date <= " => $this->data['date_to'],
				// 		"teachertype = " => $this->data['teacher_type'],
				// 		"verifyStatus" => $this->data['verify_status'],
				// );
				
				$this->data['teachers'] = $this->tattendance_m->get_tattendance_verifyflg($where);

				$data = array(
						"dateFrom" => $this->data['date_from'],
						"dateTo" => $this->data['date_to'],
						"teachertype" => $this->data['teacher_type'],
				);
				
				$this->session->set_userdata($data);
			}else {
				$sessionFlg = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
				if($sessionFlg){
					$this->data['date_from'] = $this->session->userdata("dateFrom");
					$this->data['date_to'] = $this->session->userdata("dateTo");
					$this->data['teacher_type'] = $this->session->userdata("teachertype");
					$this->data['verify_status'] = $this->session->userdata("verifyStatus");
					// $this->data['teachers'] = $this->teacher_m->get_teacher();
					$where = array();
					$where["date >="] = "'".$this->data['date_from']."'";
					$where["date <="] = "'".$this->data['date_to']."'";
					
					if($this->data['teacher_type'] != ""){
						$where["teachertype ="] = "'".$this->data['teacher_type']."'";
					}
					$this->data['teachers'] = $this->tattendance_m->get_tattendance_verifyflg($where);
				}else{
					$this->data['teachers'] = [];
					// $today = strtotime(date("Y-m"));
					// $lastmonth = mktime(0, 0, 0, date("m")-1, 1, date("Y"));
					$this->data['date_from'] = date("Y-m-01", time());
					$this->data['date_to'] = date("Y-m-t", time());
					$this->data['teacher_type'] = '';
					$this->data['verify_status'] = '';
				}
			}
			$this->data["subview"] = "tattendance/index";
			$this->load->view('_layout_main', $this->data);
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	public function detaile() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" || $usertype == "Teacher" || $usertype == "TeacherManager" || $usertype == "Receptionist"|| $usertype == "Salesman") {
			if($_POST) {
				$this->data['date_from'] = $this->input->post("date_from");
				$this->data['date_to'] = $this->input->post("date_to");
				$this->data['teacher_type'] = $this->input->post("teacherType");
				$this->data['verify_status'] = $this->input->post("verify_status");
				
				$sessionFlg = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
				if($sessionFlg){
					$this->data['teachers'] = $this->teacher_m->get_teacher($sessionFlg);
					
				}else{
					if($usertype == "Teacher" || $usertype == "TeacherManager" || $usertype == "Receptionist"|| $usertype == "Salesman"){
						$this->data['teachers'] = array($this->teacher_m->get_teacher($this->session->userdata("loginuserID")));
					}else{
						$this->data['teachers'] = $this->teacher_m->get_teacher();
					}
				}
				$data = array(
						"dateFrom" => $this->data['date_from'],
						"dateTo" => $this->data['date_to'],
						"teachertype" => $this->data['teacher_type'],
						"verifyStatus" => $this->data['verify_status'],
				);
				$this->session->set_userdata($data);
				
			}else {
				$sessionFlg = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
				if($sessionFlg){
					$this->data['date_from'] = $this->session->userdata("dateFrom");
					$this->data['date_to'] = $this->session->userdata("dateTo");
					if(!$this->data['date_from']){
						$this->data['date_from'] = date("Y-m-01", time());						
					}
					if(!$this->data['date_to']){
						$this->data['date_to'] = date("Y-m-t", time());
					}
					
					
					$this->data['teacher_type'] = $this->session->userdata("teachertype");
					$this->data['verify_status'] = $this->session->userdata("verifyStatus");
					$this->data['teachers'] = $this->teacher_m->get_teacher($sessionFlg);
				}else{
					$this->data['teachers'] = [];
					// $today = date("Y-m-d");
					// $lastmonth = mktime(0, 0, 0, date("m")-1, date("d"),   date("Y"));
					// $this->data['date_from'] = date("Y-m-d", $lastmonth);
					// $this->data['date_to'] = $today;
					$this->data['date_from'] = date("Y-m-01", time());
					$this->data['date_to'] = date("Y-m-t", time());
					$this->data['teacher_type'] = '';
					$this->data['verify_status'] = '';
				}
			}
			$this->data["subview"] = "tattendance/detaile";
			$this->load->view('_layout_main', $this->data);
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	public function verify_all(){
		$teacherID = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
		if((int)$teacherID){
			$array = array(
				'teacherID' => $teacherID,
				'date >=' => $this->session->userdata("dateFrom"),
				'date <=' => $this->session->userdata("dateTo"),
				'verifyflg' => '0'
			);
			$attendances = $this->tattendance_m->get_order_by_tattendance($array);
			if(count($attendances)) {
				$i = 1; 
				foreach($attendances as $key => $attendance) {
					$teacher = $this->teacher_m->get_teacher($teacherID);
					date_default_timezone_set("UTC");
					$workingHours =  $this->wage_m->quarter_round(date("H:i", strtotime($attendance->end_time) - strtotime($attendance->start_time)),0);
					$timing_remuneration = 0;
					if($attendance->tattendancetype == "1"){
						$timing_remuneration = $teacher->lecture_timing_remuneration;
					}else if($attendance->tattendancetype == "2"){
						$timing_remuneration = $teacher->affairs_timing_remuneration;
					}else if($attendance->tattendancetype == "3"){
						$timing_remuneration = $teacher->vip_timing_remuneration;
					}
					$array = array();
					if($attendance->wage != 0){
						$array["wage"] = $attendance->wage;
					}else{
						$array["wage"] = $workingHours * $timing_remuneration;
					}
					$array["work_time"] = $workingHours;
					$array["verifyflg"] = '1';	
					$this->tattendance_m->update_tattendance($array, $attendance->tattendanceID);
				}
			}
			$this->session->set_flashdata('success', $this->lang->line('menu_success'));
			redirect(base_url("tattendance/detaile/".$teacherID));
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	public function verify() {
		$tattendanceID = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
		$flg = htmlentities(mysql_real_escape_string($this->uri->segment(4)));
		$teacherID = htmlentities(mysql_real_escape_string($this->uri->segment(5)));
		if((int)$tattendanceID){
			
			if($flg == 1){
				$attendance = $this->tattendance_m->get_tattendance($tattendanceID);
				$teacher = $this->teacher_m->get_teacher($teacherID);
					
				date_default_timezone_set("UTC");
					
				$workingHours =  $this->wage_m->quarter_round(date("H:i", strtotime($attendance->end_time) - strtotime($attendance->start_time)),0);
					
					
				$timing_remuneration = 0;
				if($attendance->tattendancetype == "1"){
					$timing_remuneration = $teacher->lecture_timing_remuneration;
				}else if($attendance->tattendancetype == "2"){
					$timing_remuneration = $teacher->affairs_timing_remuneration;
				}else if($attendance->tattendancetype == "3"){
					$timing_remuneration = $teacher->vip_timing_remuneration;
				}
					
				
				$array = array();
				
				if($attendance->wage != 0){
					$array["wage"] = $attendance->wage;
				}else{
					$array["wage"] = $workingHours * $timing_remuneration;
				}
				
				
				
				
				$array["work_time"] = $workingHours;
				$array["verifyflg"] = $flg;				
			}else{
				$array["wage"] = 0;
				$array["verifyflg"] = $flg;
			}
			
			$this->tattendance_m->update_tattendance($array, $tattendanceID);
			
			
			$this->session->set_flashdata('success', $this->lang->line('menu_success'));
			redirect(base_url("tattendance/detaile/".$teacherID));
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	public function add() {
		$usertype = $this->session->userdata("usertype");
		
		if($usertype == "Admin" || $usertype == "TeacherManager"|| $usertype == "Teacher" || $usertype == "Salesman"|| $usertype == "Receptionist") {

			$this->data['subjectID'] = 0;
			$this->data['sectionID'] = 0;
			
			$teacherID= $this->input->post("teacherID");
				
			if($usertype == "Admin" ||  $usertype == "TeacherManager"){
				$this->data['teachers'] = $this->teacher_m->get_teacher();

			}else{
				
				$this->data['teachers'] = array($this->teacher_m->get_teacher($this->session->userdata("loginuserID")));
			}

			
			if($usertype != "Admin"){
				$teacherID = $this->session->userdata("loginuserID");
				
				if($this->input->post("teacherID") != "") $teacherID = $this->input->post("teacherID");
				
			}
			
			$this->data['date'] = date("Y-m-d");
			
			
			
			$this->data['transportation_expenses'] = [];
			$this->data['transportation_expenses'] = $this->teacher_transport_m->get_order_by_teacher_transport(array("teacherID"=>$teacherID));
				
			if($_POST) {
			
				$rules = $this->rules();
				
				$tattendanceType = $this->input->post("tattendance_type");
				$teacher_transport_ID = $this->input->post("TE_select");
				$teacher_transport_amount = $this->input->post("TE_Amount");
				$work_note = $this->input->post("TE_note");
								
				$this->form_validation->set_rules($rules);
				if ($this->form_validation->run() == FALSE) {
					$this->data["subview"] = "tattendance/add";
					$this->load->view('_layout_main', $this->data);
				} else {
					
					$date = $this->input->post("date");
					$this->data['date'] = $date;
					$explode_date = explode("-", $date);
					$monthyear = $explode_date[0]."-".$explode_date[1];
					$teacherID = $this->input->post("teacherID");
					$last_day = cal_days_in_month(CAL_GREGORIAN, $explode_date[1], $explode_date[2]);
					if($last_day >= $explode_date[1]) {

						$teacher = $this->teacher_m->get($teacherID);
						$array = array(
							"teacherID" => $teacherID,
							"usertype" => $teacher->usertype,
							"monthyear" => $monthyear,
							"date" => date('Y-m-d', strtotime($date)),
							"tattendancetype" => $tattendanceType,
							"start_time" => $this->fixTimeStr($this->input->post("start_time")),
							"end_time" => $this->fixTimeStr($this->input->post("end_time")),
							"teacher_transport_ID" => $teacher_transport_ID,
							"teacher_transport_amount" => $teacher_transport_amount,
							"work_note" => $work_note,		
						);

						$this->tattendance_m->insert_tattendance($array);
						redirect(base_url("tattendance/detaile/".$teacherID));
					} else {
						$this->data["subview"] = "error";
						$this->load->view('_layout_main', $this->data);
					}
				}
			} else {
				$this->data["subview"] = "tattendance/add";
				$this->load->view('_layout_main', $this->data);
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	function edit(){
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" || $usertype == "Teacher" || $usertype == "TeacherManager" || $usertype == "Receptionist"|| $usertype == "Salesman") {
			$tattendanceID = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			$this->data['classes'] = $this->classes_m->get_classes_1();
			$classesID = $this->input->post("classesID");


			$this->data['subjectID'] = 0;
			$this->data['sectionID'] = 0;

			$this->data['teachers'] = $this->teacher_m->get_teacher();
			$this->data['teacherID'] = 0;

			if((int)$tattendanceID){
				$tattendance = $this->tattendance_m->get($tattendanceID);
				$this->data['tattendance'] = $tattendance;
				
				$teacherID= $tattendance->teacherID;
				$this->data['transportation_expenses'] = $this->teacher_transport_m->get_order_by_teacher_transport(array("teacherID"=>$teacherID));
				
				if($tattendance){
					if($_POST) {
						$rules = $this->rules();
						$tattendanceType = $this->input->post("tattendance_type");
						
						$teacher_transport_ID = $this->input->post("TE_select");
						$teacher_transport_amount = $this->input->post("TE_Amount");
						$work_note = $this->input->post("TE_note");
						
						
						$work_wage = $this->input->post("TE_wage");
						
						if($work_wage == ""){
							$work_wage = 0;
						}
						
						$this->form_validation->set_rules($rules);
						
						if ($this->form_validation->run() == FALSE) {
							$this->data["subview"] = "tattendance/edit";
							$this->load->view('_layout_main', $this->data);
						} else {
							$date = $this->input->post("date");
							$this->data['date'] = $date;
							$explode_date = explode("-", $date);
							$monthyear = $explode_date[0]."-".$explode_date[1];
							$teacherID = $this->input->post("teacherID");
							$last_day = cal_days_in_month(CAL_GREGORIAN, $explode_date[1], $explode_date[2]);
							if($last_day >= $explode_date[1]) {
								
								$teacher = $this->teacher_m->get($teacherID);
								$array = array(
									"teacherID" => $teacherID,
									"usertype" => $teacher->usertype,
									"monthyear" => $monthyear,
									"date" => date('Y-m-d', strtotime($date)),
									"tattendancetype" => $tattendanceType,
									"start_time" => $this->fixTimeStr($this->input->post("start_time")),
									"end_time" => $this->fixTimeStr($this->input->post("end_time")),
									"teacher_transport_ID" => $teacher_transport_ID,
									"teacher_transport_amount" => $teacher_transport_amount,
									"work_note" => $work_note,
									"wage" => 	$work_wage,	
								);
								
								if($tattendanceType){
									$array["tattendancetype"] = $tattendanceType;
								}
								$this->tattendance_m->update_tattendance($array, $tattendanceID);
								redirect(base_url("tattendance/detaile/$teacherID"));
							} else {
								$this->data["subview"] = "error";
								$this->load->view('_layout_main', $this->data);
							}
						}
					}else{
						$this->data["subview"] = "tattendance/edit";
						$this->load->view('_layout_main', $this->data);
					}
				}else{
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

	function delete(){
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" || $usertype == "Teacher" || $usertype == "TeacherManager" || $usertype == "Receptionist"|| $usertype == "Salesman") {
			$tattendanceID = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			if((int)$tattendanceID){
				
				$tattendance = $this->tattendance_m->get($tattendanceID);
				
				$this->tattendance_m->delete_tattendance($tattendanceID);
				$this->session->set_flashdata('success', $this->lang->line('menu_success'));
				
				redirect(base_url("tattendance/detaile/".$tattendance->teacherID));
			} else {
				$this->data["subview"] = "error";
				$this->load->view('_layout_main', $this->data);
			}
		}else{
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	function singl_add() {
		$id = $this->input->post('id');
		$day = $this->input->post('day');
		if((int)$id && (int)$day) {
			$tattendance_row = $this->tattendance_m->get_tattendance($id);
			$aday = "a".abs($day);
			if($tattendance_row) {
				if($tattendance_row->$aday == "") {
					$this->tattendance_m->update_tattendance(array($aday => "P"), $id);
					echo $this->lang->line('menu_success');
				} elseif($tattendance_row->$aday == "P") {
					$this->tattendance_m->update_tattendance(array($aday => "A"), $id);
					echo $this->lang->line('menu_success');
				} elseif($tattendance_row->$aday == "A") {
					$this->tattendance_m->update_tattendance(array($aday => "P"), $id);
					echo $this->lang->line('menu_success');
				}
			}
		}
	}

	function all_add() {
		$day = $this->input->post('day');
		$monthyear = $this->input->post('monthyear');
		$status = 0;
		$status = $this->input->post('status');

		if($status == "checked") {
			$status = "P";
		} elseif($status == "unchecked") {
			$status = "A";
		}
		if((int)$day) {
			$array = array("a".abs($day) => $status);
			$this->tattendance_m->update_tattendance_all($array, array("monthyear" => $monthyear));
			echo $this->lang->line('menu_success');
		}
	}

	public function view() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin") {
			$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			if ((int)$id) {
				$this->data["teacher"] = $this->teacher_m->get_teacher($id);
				if($this->data["teacher"]) {
					$this->data['attendances'] = $this->tattendance_m->get_order_by_tattendance(array("teacherID" => $id));
					$this->data["subview"] = "tattendance/view";
					$this->load->view('_layout_main', $this->data);
				} else {
					$this->data["subview"] = "error";
					$this->load->view('_layout_main', $this->data);
				}
			} else {
				$this->data["subview"] = "error";
				$this->load->view('_layout_main', $this->data);
			}
		} elseif($usertype == "Teacher") {
			$username = $this->session->userdata("username");
			$teacher = $this->teacher_m->get_single_teacher(array("username" => $username));
			if($teacher) {
				$this->data["teacher"] = $teacher;
				$this->data['attendances'] = $this->tattendance_m->get_order_by_tattendance(array("teacherID" => $teacher->teacherID));
				$this->data["subview"] = "tattendance/view";
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

	private function fixTimeStr($timeStr){
		if(strlen($timeStr) < 5){
			return '0'.$timeStr;
		}
		return $timeStr;
	}

	function check_start_time(){
		if($this->fixTimeStr($this->input->post("start_time")) > $this->fixTimeStr($this->input->post("end_time"))){
			$this->form_validation->set_message("check_start_time", "%s 必须小于结束时间");
			return FALSE;
		}
		return TRUE;
	}

	function check_end_time(){
		if($this->fixTimeStr($this->input->post("start_time")) > $this->fixTimeStr($this->input->post("end_time"))){
			$this->form_validation->set_message("check_end_time", "%s 必须大于开始时间");
			return FALSE;
		}
		return TRUE;
	}

	function date_valid($date) {
		if($date == null) {return TRUE;}
		if(strlen($date) <10) {
			$this->form_validation->set_message("date_valid", "%s 不是有效的日期格式 yyyy-mm-dd");
	     	return FALSE;
		} else {
	   		$arr = explode("-", $date);
	        $yyyy = $arr[0];
	        $mm = $arr[1];
	        $dd = $arr[2];
	      	if(checkdate($mm, $dd, $yyyy)) {
	      		return TRUE;
	      	} else {
	      		$this->form_validation->set_message("date_valid", "%s 不是有效的日期格式 yyyy-mm-dd");
	     		return FALSE;
	      	}
	    }
	}





	function valid_future_date($date) {
		$presentdate = date('Y-m-d');
		$date = date("Y-m-d", strtotime($date));
		if($date > $presentdate) {
			$this->form_validation->set_message("valid_future_date", "%s 必须小于等于今天！");
			return FALSE;
		}
		return TRUE;
	}

	function teacherOptioncall() {

		$teacherID = $this->input->post('teacherID');
		if((int)$teacherID) {
			// $option_type = "transportation_expenses";
			//$alltransport = $this->teacher_options_m->get_teacher_options(array("option_type" => $option_type,"teacherID" => $teacherID));
			$alltransport =$this->teacher_transport_m->get_order_by_teacher_transport(array("teacherID"=>$teacherID));
			$array = array();
			foreach ($alltransport as $row) {
				$array[$row->teacher_transport_ID] = $row->transport_name;
			}
		}	
		echo json_encode($array);
	}

	function getfare() {
		$teacher_transport_ID = $this->input->post('teacher_transport_ID');

		if((int)$teacher_transport_ID) {

			$transport = $this->teacher_transport_m->get_order_by_teacher_transport(array('teacher_transport_ID' => $teacher_transport_ID));
			//echo "<option value='0'>", $this->lang->line("routine_select_section"),"</option>";
			
			if(count($transport) > 0) echo $transport[0]->fare;
		}
	}
}

/* End of file class.php */
/* Location: .//D/xampp/htdocs/school/mvc/controllers/class.php */
