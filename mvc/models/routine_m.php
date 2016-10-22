<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Routine_m extends MY_Model {

	protected $_table_name = 'routine';
	protected $_primary_key = 'routineID';
	protected $_primary_filter = 'intval';
	protected $_order_by = "classesID asc";

	function __construct() {
		parent::__construct();
	}

	function get_classes() {
		//$this->db->select('*')->from('classes')->order_by('classes_numeric asc');
		$this->db->select('*')->from('classes');
		$this->db->where("classes.classesID != 1");
		$this->db->order_by('classes_numeric asc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_subject($id) {
		$query = $this->db->get_where('subject', array('classesID' => $id));
		return $query->result();
	}

	function get_join_all($id = NULL) {
		$this->db->select('*');
		$this->db->from('routine');
		if($id != NULL){
			$this->db->where(array('routine.classesID' => $id ));
		}
		$this->db->join('classes', 'classes.classesID = routine.classesID && classes.classesID != "1"', 'LEFT');
		$this->db->join('section', 'section.sectionID = routine.sectionID', 'LEFT');
		$this->db->join('subject', 'subject.subjectID = routine.subjectID', 'LEFT');
		$query = $this->db->get();
		return $query->result();
	}

	function get_join_all1($id = NULL) {
		$this->db->select('*');
		$this->db->from('routine');
		$this->db->join('subject', 'subject.subjectID = routine.subjectID', 'INNER');
		$this->db->join('course_details', 'course_details.subjectID = routine.subjectID', 'INNER');
		$this->db->join('classes', 'classes.classesID = course_details.classesID && classes.classesID != "1"', 'INNER');
		if($id != NULL){
			$this->db->where(array('course_details.classesID' => $id ));
		}
		$query = $this->db->get();
		return $query->result();
	}

	function get_join_all_wsection($subjectID, $day) {
		$this->db->select('*');
		$this->db->from('routine');
		$this->db->where(array('routine.subjectID' => $subjectID, 'routine.day' => $day));
		// $this->db->join('classes', 'classes.classesID = routine.classesID', 'LEFT');
		//$this->db->join('section', 'section.sectionID = routine.sectionID', 'LEFT');
		// $this->db->join('subject', 'subject.subjectID = routine.subjectID && subject.classesID = routine.classesID', 'LEFT');
		$this->db->join('subject', 'subject.subjectID = routine.subjectID', 'LEFT');
		$query = $this->db->get();
		return $query->result();
	}

	function get_routine($array=NULL, $signal=FALSE) {
		$query = parent::get($array, $signal);
		return $query;
	}

	function get_order_by_routine($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	function get_order_by_date($array=NULL) {
		$this->db->select('*');
		$this->db->from($this->_table_name);
		$this->db->order_by('date asc'); 
		$this->db->where($array);
		$query = $this->db->get();

		return $query->result();
	}

	function insert_routine($array) {
		$error = parent::insert($array);
		return TRUE;
	}

	function update_routine($data, $id = NULL) {
		parent::update($data, $id);
		return $id;
	}

	public function delete_routine($id){
		parent::delete($id);
	}

	// public function get_routine_group_by($id, $sectionID = NULL){
	public function get_routine_group_by(){
		//$this->db->select('routine.classesID,routine.sectionID,routine.subjectID,routine.day,routine.start_time,routine.end_time,routine.room,section.section,subject.subject');
		// $this->db->select('routine.classesID,routine.sectionID,routine.subjectID,routine.day,routine.start_time,routine.end_time,routine.room,subject.subject');
		$this->db->select('routine.subjectID,routine.day,routine.start_time,routine.end_time,routine.room,subject.subject');
		$this->db->from('routine');
		// $where = array('routine.classesID' => $id);
		// if($sectionID !== NULL){
		// 	$where['routine.sectionID']  = $sectionID;
		// }
		// $this->db->where($where);
		// $this->db->join('classes', 'classes.classesID = routine.classesID', 'INNER');
		//$this->db->join('section', 'section.sectionID = routine.sectionID', 'INNER');
		// $this->db->join('subject', 'subject.subjectID = routine.subjectID && subject.classesID = routine.classesID', 'INNER');
		$this->db->join('subject', 'subject.subjectID = routine.subjectID', 'INNER');
		//$this->db->group_by('routine.classesID,routine.sectionID,routine.subjectID,routine.day,routine.start_time,routine.end_time,routine.room,section.section,subject.subject');
		// $this->db->group_by('routine.classesID,routine.sectionID,routine.subjectID,routine.day,routine.start_time,routine.end_time,routine.room,subject.subject');
		$this->db->group_by('routine.subjectID,routine.day,routine.start_time,routine.end_time,routine.room,subject.subject');
		$this->db->order_by('start_time asc');
		$query = $this->db->get();
		return $query->result();
	}
}

/* End of file routine_m.php */
/* Location: .//D/xampp/htdocs/school/mvc/models/routine_m.php */