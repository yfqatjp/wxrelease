<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course_details_m extends MY_Model {

	protected $_table_name = 'course_details';
	protected $_order_by = "classesID asc,subjectID asc";

	function __construct() {
		parent::__construct();
	}

	public function delete_by_classID($classID){
		$this->db->where('classesID', $classID);
		$this->db->delete($this->_table_name); 
	}

	public function get_by_classID($classID){
		$query = $this->db->get_where($this->_table_name, array('classesID' => $classID));
		return $query->result();;
	}
}

/* End of file course_details_m.php */
/* Location: .//D/xampp/htdocs/school/mvc/models/course_details_m.php */