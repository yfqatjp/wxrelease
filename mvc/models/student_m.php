<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class student_m extends MY_Model {

	protected $_table_name = 'student';
	protected $_primary_key = 'studentID';
	protected $_primary_filter = 'intval';
	protected $_order_by = "roll asc";

	function __construct() {
		parent::__construct();
	}

	function get_username($table, $data=NULL) {
		$query = $this->db->get_where($table, $data);
		return $query->result();
	}

	function get_class($id=NULL) {
		$query = $this->db->get_where('classes', array('classesID' => $id));
		return $query->row();
	}

	function get_classes() {
		//$this->db->select('*')->from('classes')->order_by('classes_numeric asc');
		//$this->db->select('*')->from('classes')->where( array('classesID > ' => 1))->order_by('classes_numeric asc');
		$this->db->select('*')->from('classes');
		$this->db->where("classes.classesID != 1");
		$this->db->order_by('classes_numeric asc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_classes_join() {
		//$this->db->select('*')->from('classes')->order_by('classes_numeric asc');
		$this->db->select('*')->from('classes')->where( array('classesID > ' => 1, 'class_type =' => 0))->order_by('classes_numeric asc');
		$query = $this->db->get();
		return $query->result();
	}


	function get_parent($id = NULL) {
		$query = $this->db->get_where('parent', array('studentID' => $id));
		return $query->row();
	}

	function get_parent_info($username = NULL) {
		$query = $this->db->get_where('parent', array('username' => $username));
		return $query->row();
	}

	function get_order_by_roll($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	function get_student($array=NULL, $signal=FALSE) {
		$query = parent::get($array, $signal);
		return $query;
	}

	function get_single_student($array) {
		$query = parent::get_single($array);
		return $query;
	}

	function get_order_by_student($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	function get_student_search($flag,$category,$source,$paymentflag = null,$studentstate = null, $querystring = null, $source_memo = null, $possibility = null, $salesman_list = null, $class_list = null) {
		$this->db->select('*');
		$this->db->from('student');

		//学生状态，1位未报名学生，1以外检索的已报名学生
		if($flag == "1"){
			$this->db->where('student.ClassesID', $flag);
		}elseif($flag == "3"){
			$this->db->like('name', $querystring);
			$this->db->or_like('phone', $querystring);
			$this->db->or_like('wechat', $querystring);
		}else{
			$this->db->where('student.ClassesID <>', 1);

			//支付状态条件添加
			if($paymentflag == "3"){ //已付清
				//支付状态
				$this->db->where('student.totalamount =  student.paidamount ');
				//支付金额
				$this->db->where('student.totalamount > ',0);

			}elseif($paymentflag == "2"){ //未付清
				//支付状态
				$this->db->where('student.totalamount <>  student.paidamount ');

			}else{

			}

			//学生在籍状态条件添加
			if($studentstate == "1"){ //在籍中
				//学生终了日大于今天
				$this->db->where('student.subjectEnd_date >= ',date("Y-m-d"));


			}elseif($studentstate == "2"){ //已过期
				//学生终了日小于今天
				$this->db->where('student.subjectEnd_date < ',date("Y-m-d"));

			}else{  //全部

			}


		}

		if($category){
		    $this->db->where_in('student.category', $category);
		}
		if($source){
			$this->db->where_in('student.source', $source);
		}
		if($source_memo){
			$this->db->where_in('student.source_memo', $source_memo);
		}
		if($possibility){
			$this->db->where_in('student.possibility', $possibility);
		}
		if($salesman_list){
			$this->db->where_in('student.salesmanID', $salesman_list);
		}
		if($class_list){
			$this->db->where_in('student.classesID', $class_list);
		}
		$this->db->order_by("modify_date", "desc");

		$query = $this->db->get();
		return $query->result();
	}

	function get_order_by_student_year($classesID) {
		$query = $this->db->query("SELECT * FROM student WHERE year = (SELECT MIN(year) FROM student) && classesID = $classesID order by roll asc");
		return $query->result();
	}

	function get_order_by_student_single_year($classesID) {
		$query = $this->db->query("SELECT year FROM student WHERE year = (SELECT MIN(year) FROM student) && classesID = $classesID order by roll asc");
		return $query->row();
	}

	function get_order_by_student_single_max_year($classesID) {
		$query = $this->db->query("SELECT year FROM student WHERE year = (SELECT MAX(year) FROM student) && classesID = $classesID order by roll asc");
		return $query->row();
	}

	function get_order_by_studen_with_section_and_classes($classesID) {
		$this->db->select('*');
		$this->db->from('student');
		$this->db->join('classes', 'student.classesID = classes.classesID', 'LEFT');
		$this->db->join('section', 'student.sectionID = section.sectionID', 'LEFT');
		$this->db->where('student.classesID', $classesID);
		$query = $this->db->get();
		return $query->result();
	}

	function get_order_by_studen_with_section($classesID, $sectionID) {
		$this->db->select('*');
		$this->db->from('student');
		$this->db->join('classes', 'student.classesID = classes.classesID', 'LEFT');
		$this->db->join('section', 'student.sectionID = section.sectionID', 'LEFT');
		$this->db->where('student.ClassesID', $classesID);
		$this->db->where('student.sectionID', $sectionID);
		$query = $this->db->get();
		return $query->result();
	}

	function get_order_by_studen_with_subject($subject) {
		$this->db->select('*');
		$this->db->from('student');
		$this->db->join('classes', 'classes.classesID = student.classesID', 'INNER');
		$this->db->join('course_details', 'course_details.classesID = classes.classesID', 'INNER');
		$this->db->where('course_details.subjectID', $subject);
		$query = $this->db->get();
		return $query->result();
	}
	
	function get_order_by_studen_with_subject_and_date($subject, $date) {
		$this->db->select('student.*,routine.start_time');
		$this->db->from('student');
		$this->db->join('classes', 'classes.classesID = student.classesID', 'INNER');
		$this->db->join('course_details', 'course_details.classesID = classes.classesID', 'INNER');
		$this->db->join('routine', 'course_details.subjectID = routine.subjectID', 'INNER');
		$this->db->where('student.subjectEnd_date >=', date("Y-m-d"));
		$this->db->where('routine.subjectID', $subject);
		$this->db->where('routine.date', $date);
		$this->db->order_by('routine.start_time asc');
		$query = $this->db->get();
		return $query->result();
	}

	function insert_student($array) {
		$id = parent::insert($array);
		return $id;
		//return TRUE;
	}

	function insert_parent($array) {
		$this->db->insert('parent', $array);
		return TRUE;
	}

	function update_student($data, $id = NULL) {
		parent::update($data, $id);
		return $id;
	}

	function update_student_classes($data, $array = NULL) {
		$this->db->set($data);
		$this->db->where($array);
		$this->db->update($this->_table_name);
	}

	function delete_student($id){
		parent::delete($id);
	}

	function delete_parent($id){
		$this->db->delete('parent', array('studentID' => $id));
	}

	function hash($string) {
		return parent::hash($string);
	}

	/* infinite code starts here */
}

/* End of file student_m.php */
/* Location: .//D/xampp/htdocs/school/mvc/models/student_m.php */
