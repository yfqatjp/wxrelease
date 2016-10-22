<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class teacher_transport_m extends MY_Model {

	protected $_table_name = 'teacher_transport';
	protected $_primary_key = 'teacher_transport_ID';
	protected $_primary_filter = 'intval';
	protected $_order_by = "teacher_transport_ID asc";

	function __construct() {
		parent::__construct();
	}

	function get_teacher_transport($array=NULL, $signal=FALSE) {
		$query = parent::get($array, $signal);
		return $query;
	}

	function get_order_by_teacher_transport($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	function insert_teacher_transport($array) {
		$error = parent::insert($array);
		return TRUE;
	}

	function update_teacher_transport($data, $id = NULL) {
		parent::update($data, $id);
		return $id;
	}

	public function delete_teacher_transport($id){
		parent::delete($id);
	}
}

/* End of file transport_m.php */
/* Location: .//D/xampp/htdocs/school/mvc/models/transport_m.php */