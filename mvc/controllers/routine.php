<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Routine extends Admin_Controller {
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
		$this->load->model("routine_m");
		$this->load->model("classes_m");
		$this->load->model("student_info_m");

		$this->load->model("subject_m");
		$this->load->model('student_m');
		$language = $this->session->userdata('lang');
		$this->lang->load('routine', $language);
		$us_days = array(
			'Mon' => $this->lang->line('monday'), 
			'Tue' => $this->lang->line('tuesday'), 
			'Wed' => $this->lang->line('wednesday'), 
			'Thu' => $this->lang->line('thursday'), 
			'Fri' => $this->lang->line('friday'), 
			'Sat' => $this->lang->line('saturday'), 
			'Sun' => $this->lang->line('sunday')
			);
		$this->data['us_days'] = $us_days;
	}

	public function index() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" || $usertype == "TeacherManager" || $usertype == "Salesman"|| $usertype == "Receptionist") {

				$this->data['routines'] = $this->routine_m->get_routine_group_by();

				if($this->data['routines']) {

				} else {
					$this->data['routines'] = NULL;
				}

				$this->data["subview"] = "routine/index";
				$this->load->view('_layout_main', $this->data);

		} elseif($usertype == "Student") {
			$student = 	$this->student_info_m->get_student_info();
			$this->data['routines'] = $this->routine_m->get_join_all_wsection($student->classesID, $student->sectionID);
			$this->data["subview"] = "routine/index";
			$this->load->view('_layout_main', $this->data);
		}  else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	protected function rules() {
		$rules = array(

		array(
		'field' => 'subjectID',
		'label' => $this->lang->line("routine_subject"),
		'rules' => 'trim|required|xss_clean|numeric|max_length[11]|callback_allsubject'
		),
		array(
		'field' => 'start_time',
		'label' => $this->lang->line("routine_start_time"),
		'rules' => 'trim|required|xss_clean|max_length[10]|callback_check_start_time'
		),
		array(
		'field' => 'end_time',
		'label' => $this->lang->line("routine_end_time"),
		'rules' => 'trim|required|xss_clean|max_length[10]|callback_check_end_time'
		)
		);
		return $rules;
	}

	public function add() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" || $usertype == "TeacherManager" || $usertype == "Salesman"|| $usertype == "Receptionist") {
			$this->data['classes'] = $this->classes_m->get_classes_1();
			$classesID = $this->input->post("classesID");

			$this->data['subjects'] = $this->subject_m->get_order_by_subject();
			$this->data['subjectID'] = 0;
			$this->data['sectionID'] = 0;
			$this->data['count'] = 10;
			$this->data['cycle'] = 1;
			$this->data['start_day'] = date("Y-m-d");
			if($_POST) {
				$days = $this->input->post("days_input");
				$rules = $this->rules();
				array_push($rules,array(
					'field' => 'start_day',
					'label' => $this->lang->line("routine_start_day"),
					'rules' => 'trim|required|xss_clean'
					),array(
					'field' => 'days_input',
					'label' => $this->lang->line("routine_day"),
					'rules' => 'xss_clean|callback_checkDays'
					)
				);
				$this->form_validation->set_rules($rules);
				if ($this->form_validation->run() == FALSE) {
					$this->data['form_validation'] = validation_errors();
					$this->data["subview"] = "routine/add";
					$this->load->view('_layout_main', $this->data);
				} else {
					$i = 0;
					foreach ($this->holiday_list($this->input->post("holidays_input"), $days) as $holiday => $tmp) {
						$time = strtotime($holiday);
						$week   =  date( "D",$time);
						$array = array(
						"classesID" => $this->input->post("classesID"),
						"sectionID" => $this->input->post("sectionID"),
						"subjectID" => $this->input->post("subjectID"),
						"date" => $holiday,
						"day" => $week,
						"start_time" => $this->fixTimeStr($this->input->post("start_time")),
						"end_time" => $this->fixTimeStr($this->input->post("end_time")),
						"room" => $this->input->post("room"),
						"color" => $this->input->post("color")
						);
						$this->routine_m->insert_routine($array);
					}
					$this->session->set_flashdata('success', $this->lang->line('menu_success'));
					redirect(base_url("routine/index"));
				}
			} else {
				$this->data["subview"] = "routine/add";
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

	public function routinesbyclass(){
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" || $usertype == "TeacherManager" || $usertype == "Salesman"|| $usertype == "Receptionist") {

			$subjectID = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			$day = htmlentities(mysql_real_escape_string($this->uri->segment(4)));
			if((int)$subjectID && $day){
				$this->data['routines'] = $this->routine_m->get_join_all_wsection($subjectID, $day);
				$this->data["subview"] = "routine/routinesbyclass";
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

	public function edit() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" || $usertype == "TeacherManager" ) {
			$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			// $url = htmlentities(mysql_real_escape_string($this->uri->segment(4)));
			if((int)$id) {
				$this->data['routine'] = $this->routine_m->get_routine($id);
				if($this->data['routine']) {
					$classID = $this->data['routine']->classesID;

					$this->data['subjects'] = $this->subject_m->get_order_by_subject();
					$this->data['set'] = $id;
					if($_POST) {
						$rules = $this->rules();
						array_push($rules,array(
							'field' => 'date',
							'label' => $this->lang->line("routine_date"), 
							'rules' => 'trim|required|xss_clean'
							)
						);
						$this->form_validation->set_rules($rules);
						if ($this->form_validation->run() == FALSE) {
							$this->data["subview"] = "routine/edit";
							$this->load->view('_layout_main', $this->data);
						} else {
							$date = $this->input->post("date");
							$time = strtotime($date);
							$week   =  date( "D",$time);
							$array = array(
							"classesID" => $this->input->post("classesID"),
							"sectionID" => $this->input->post("sectionID"),
							"subjectID" => $this->input->post("subjectID"),
							"date" => $date,
							"day" => $week,
							"start_time" => $this->fixTimeStr($this->input->post("start_time")),
							"end_time" => $this->fixTimeStr($this->input->post("end_time")),
							"room" => $this->input->post("room")
							);

							$this->routine_m->update_routine($array, $id);
							$this->session->set_flashdata('success', $this->lang->line('menu_success'));
							redirect(base_url("routine/index/$id"));
						}
					} else {
						$this->data["subview"] = "routine/edit";
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

	public function edit_batch() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" || $usertype == "TeacherManager" || $usertype == "Salesman"|| $usertype == "Receptionist") {
			$subjectID = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			$day = htmlentities(mysql_real_escape_string($this->uri->segment(4)));
			$room = htmlentities(mysql_real_escape_string($this->uri->segment(5)));
			$where = array(
				'1' => $subjectID,
				'2' => $day
			);
			// $this->data['routines'] = $this->routine_m->get_routine_group_by_sub();
			$this->data['routines'] = $this->routine_m->get_join_all_wsection($subjectID, $day);
			if($this->data['routines'] && count($this->data['routines']) > 1){
				$this->data['start_time'] = $this->data['routines'][0]->start_time;
				$this->data['end_time'] = $this->data['routines'][0]->end_time;
				$this->data['color'] = $this->data['routines'][0]->color;
			}else{
				$this->data['start_time'] = Date(Y-m-d);
				$this->data['end_time'] = Date(Y-m-d);
				$this->data['color'] = '#00ffff';
			}
			$this->data['subjects'] = $this->subject_m->get_order_by_subject();
			$this->data['subjectID'] = $subjectID;
			$this->data['day'] = $day;
			$this->data['room'] = $room;
			if($_POST) {
				$days = $this->input->post("days_input");
				$rules = $this->rules();
				$this->form_validation->set_rules($rules);
				if ($this->form_validation->run() == FALSE) {
					$this->data['form_validation'] = validation_errors();
					$this->data["subview"] = "routine/edit_batch";
					$this->load->view('_layout_main', $this->data);
				} else {
					foreach ($this->data['routines'] as $value) {
						$update_data = array(
							"subjectID" => $this->input->post("subjectID"),
							"start_time" => $this->fixTimeStr($this->input->post("start_time")),
							"end_time" => $this->fixTimeStr($this->input->post("end_time")),
							"room" => $this->input->post("room"),
							"color" => $this->input->post("color")
						);
						$this->routine_m->update_routine($update_data, $value->routineID);
					}
					$this->session->set_flashdata('success', $this->lang->line('menu_success'));
					redirect(base_url("routine/index"));
				}
			} else {
				$this->data["subview"] = "routine/edit_batch";
				$this->load->view('_layout_main', $this->data);
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	public function delete() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" || $usertype == "TeacherManager" ) {
			$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			if((int)$id) {
				$routine = $this->routine_m->get_routine($id);
				$this->routine_m->delete_routine($id);
				$this->session->set_flashdata('success', $this->lang->line('menu_success'));
				redirect(base_url("routine/routinesbyclass/$routine->subjectID/$routine->day"));
			} else {
				redirect(base_url("routine/index"));
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	public function delete_by_subjectID() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" || $usertype == "TeacherManager" ) {
			$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			if((int)$id) {
				$routine_array = $this->routine_m->get_order_by(array('subjectID' => $id));
				if(!is_array($routine_array)){
					$routine_array = array($routine_array);
				}
				foreach ($routine_array as $routine) {
					$this->routine_m->delete_routine($routine->routineID);
				}
				$this->session->set_flashdata('success', $this->lang->line('menu_success'));
				redirect(base_url("routine/index"));
			} else {
				$this->data["subview"] = "error";
				$this->load->view('_layout_main', $this->data);
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	public function routine_list() {
		$classID = $this->input->post('id');
		if((int)$classID) {
			$string = base_url("routine/index/$classID");
			echo $string;
		} else {
			redirect(base_url("routine/index"));
		}
	}

	public function student_list() {
		$studentID = $this->input->post('id');
		if((int)$studentID) {
			$string = base_url("routine/index/$studentID");
			echo $string;
		} else {
			redirect(base_url("routine/index"));
		}
	}

	function allsubject() {
		if($this->input->post('subjectID') == 0) {
			$this->form_validation->set_message("allsubject", "%s 必须输入");
			return FALSE;
		}
		return TRUE;
	}

	function allsection() {
		if($this->input->post('sectionID') == 0) {
			$this->form_validation->set_message("allsection", "%s 必须输入");
			return FALSE;
		}
		return TRUE;
	}

	function subjectcall() {
		$classID = $this->input->post('id');

		if((int)$classID) {
			$allclasses = $this->routine_m->get_subject($classID);
			echo "<option value='0'>", $this->lang->line("routine_subject_select"),"</option>";
			foreach ($allclasses as $value) {
				echo "<option value=\"$value->subjectID\">",$value->subject,"</option>";
			}
		}
	}

	function sectioncall() {
		$classID = $this->input->post('id');

		if((int)$classID) {
			$allsection = $this->section_m->get_order_by_section(array('classesID' => $classID));
			echo "<option value='0'>", $this->lang->line("routine_select_section"),"</option>";
			foreach ($allsection as $value) {
				echo "<option value=\"$value->sectionID\">",$value->section,"</option>";
			}
		}
	}

	function unique_room() {
		$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
		if((int)$id) {
			$routine = $this->routine_m->get_order_by_routine(array('classesID' => $this->input->post('classesID'), 'day' => $this->input->post('day'), 'start_time' => $this->input->post('start_time'), 'end_time' => $this->input->post('end_time'), 'room' => $this->input->post('room'), 'routineID !=' => $id ));
			if(count($routine)) {
				$this->form_validation->set_message("unique_room", "%s already exists");
				return FALSE;
			}
			return TRUE;

		} else {
			$routine = $this->routine_m->get_order_by_routine(array('classesID' => $this->input->post('classesID'), 'day' => $this->input->post('day'), 'start_time' => $this->input->post('start_time'), 'end_time' => $this->input->post('end_time'), 'room' => $this->input->post('room'), ));
			if(count($routine)) {
				$this->form_validation->set_message("unique_room", "%s already exists");
				return FALSE;
			}
			return TRUE;
		}
	}

	function check_start_time(){
		if($this->fixTimeStr($this->input->post("start_time")) >= $this->fixTimeStr($this->input->post("end_time"))){
			$this->form_validation->set_message("check_start_time", "%s 必须小于结束时间");
			return FALSE;
		}
		return TRUE;
	}

	function check_end_time(){
		if($this->fixTimeStr($this->input->post("start_time")) >= $this->fixTimeStr($this->input->post("end_time"))){
			$this->form_validation->set_message("check_end_time", "%s 必须大于开始时间");
			return FALSE;
		}
		return TRUE;
	}

	function allclasses() {
		if($this->input->post('classesID') == 0) {
			$this->form_validation->set_message("allclasses", "%s 必须输入");
			return FALSE;
		}
		return TRUE;
	}

	function checkDays(){
		$days = $this->input->post("days_input");
		if($days){
			$cycle = (int)$this->input->post('cycle');
			return TRUE;
		}else{
			$this->form_validation->set_message("checkDays", "%s 必须输入");
			return FALSE;
		}
	}

	// 课程日（可选休日）列表生成
	private function holiday_list($holidays, $days){
		// 课程计划开始日期
		$start_day = $this->input->post('start_day');
		// 课程次数
		$count = (int)$this->input->post('count');
		// 课程周期
		$cycle = (int)$this->input->post('cycle');
		// 开始日期转化为时间戳用于日期处理
		$time = strtotime($start_day);
		// 年
		$y = date('Y', $time);
        // 月
		$m = date('n', $time);
        // 日
		$d = date('j', $time);
		if($days){
		for ($i=0; $i < $count; ) {
			$flg = false;
			while (!$flg) {
				$holiday  = date("Y-m-d", mktime(0, 0, 0, $m , $d, $y));
				date_default_timezone_set('Asia/Tokyo');
				$time1 = strtotime($holiday);
				$week   =  date( "D",$time1);
				foreach ($days as $value) {
					if($week == $value){
						$flg = true;
						break;
					}
				}
				$d ++;
			}
			if($holidays){
				if(false !== array_search($holiday,$holidays,true)){
					continue;
				}
			}
			$i++;
			$tmp = $this->get_week_name($time1);
			yield $holiday => $tmp;
		}
		}
	}

	// 画面元素生成
	function get_holiday_list(){
		$holidays = $this->input->post('holiday');
		$days = $this->input->post('days');
		echo "<option value=''>", $this->lang->line("routine_holiday_select"),"</option>";
		foreach ($this->holiday_list($holidays, $days) as $holiday => $tmp) {
			echo "<option value=\"$holiday\">",$holiday,'('.$tmp.')',"</option>";
		}
	}

	private function get_week_name($data,$format = '')
	{
		$week   =  date( "D",$data);
		switch($week)
		{
			case "Mon":
			$current   =   $format.$this->lang->line('monday');
			break;
			case "Tue":
			$current   =   $format.$this->lang->line('tuesday');
			break;
			case "Wed":
			$current   =   $format.$this->lang->line('wednesday');
			break;
			case "Thu":
			$current   =   $format.$this->lang->line('thursday');
			break;
			case "Fri":
			$current   =   $format.$this->lang->line('friday');
			break;
			case "Sat":
			$current   =   $format.$this->lang->line('saturday');
			break;
			case "Sun":
			$current   =   $format.$this->lang->line('sunday');
			break;
		}
		return $current;
	}
}

/* End of file routine.php */
/* Location: .//D/xampp/htdocs/school/mvc/controllers/routine.php */