<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subject_teacher_details_m extends MY_Model {

	protected $_table_name = 'subject_teacher_details';
	protected $_order_by = "subjectID asc,teacherID asc";

	function __construct() {
		parent::__construct();
	}

	public function delete_by_subjectID($subjectID){
		$this->db->where('subjectID', $subjectID);
		$this->db->delete($this->_table_name); 
	}

	public function get_by_subjectID($subjectID){
		$query = $this->db->get_where($this->_table_name, array('subjectID' => $subjectID));
		return $query->result();;
	}
}

/* End of file course_details_m.php */
/* Location: .//D/xampp/htdocs/school/mvc/models/course_details_m.php */