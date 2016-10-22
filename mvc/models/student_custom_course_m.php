<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_custom_course_m extends MY_Model {

	protected $_table_name = 'student_custom_course';
	protected $_primary_key = 'student_custom_courseID';
	protected $_primary_filter = 'intval';
	protected $_order_by = "student_custom_courseID asc";

	function __construct() {
		parent::__construct();
	}

	function get_student_custom_course($array=NULL, $signal=FALSE) {
		$query = parent::get($array, $signal);
		return $query;
	}

	function get_order_by_student_custom_course($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	function insert_student_custom_course($array) {
		$error = parent::insert($array);
		return $error;
	}

	function update_student_custom_course($data, $id = NULL) {
		parent::update($data, $id);
		return $id;
	}

	public function delete_student_custom_course($id){
		parent::delete($id);
	}
}