<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Salesman_m extends MY_Model {

	protected $_table_name = 'salesman';
	protected $_primary_key = 'salesmanID';
	protected $_primary_filter = 'intval';
	protected $_order_by = "salesmanID asc";

	function __construct() {
		parent::__construct();
	}

	function get_username($table, $data=NULL) {
		$query = $this->db->get_where($table, $data);
		return $query->result();
	}
	
	function get_classes() {
		$this->db->select('*')->from('classes')->order_by('classes_numeric asc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_order_by_roll($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	function get_roll($id) {
		$query = $this->db->get_where('student', array('classesID' => $id, "parent !=" => 1));
		return $query->result();
	}

	function get_salesman($array=NULL, $signal=FALSE) {
		$query = parent::get($array, $signal);
		return $query;
	}

	function get_single_salesman($array) {
		$query = parent::get_single($array);
		return $query;
	}

	function get_order_by_salesman($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	function insert_salesman($array) {
		$error = parent::insert($array);
		return TRUE;
	}

	function update_salesman($data, $id = NULL) {
		parent::update($data, $id);
		return $id;
	}

	function update_student($data, $id = NULL) {
		$this->db->where('studentID', $id);
		$this->db->update('student', $data);
		return TRUE;
	}

	function delete_salesman($id){
		parent::delete($id);
		return TRUE;
	}

	function hash($string) {
		return parent::hash($string);
	}

	/* ini code starts here	*/
}

/* End of file parent_m.php */
/* Location: .//D/xampp/htdocs/school/mvc/models/parent_m.php */