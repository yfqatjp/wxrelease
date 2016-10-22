<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Code_m extends MY_Model {

	protected $_table_name = 'code';
	protected $_primary_key = 'codeId';
	protected $_primary_filter = 'intval';
	protected $_order_by = "codeName , sort asc";

	function __construct() {
		parent::__construct();
	}

	function get_order_by_code($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	function insert_code($array) {
		$error = parent::insert($array);
		return TRUE;
	}

	function update_code($data, $id = NULL) {
		parent::update($data, $id);
		return $id;
	}
	
	function get_single_code($array) {
		$query = parent::get_single($array);
		return $query;
	}
	
	
	public function delete_code($id){
		parent::delete($id);
	}
	
	
	public function  get_max_id(){
		
		$query = $this->db->query("SELECT MAX(codeid) AS maxid FROM code;");
		
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
		
			return  $row->maxid;

		}
		
	return 0;	
	}

	public function  get_max_code_by_name($where){
		
		$query = $this->db->select('MAX(code) AS maxid')->from('code')->where($where)->get();
		
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
		
			return  $row->maxid;

		}
		
	return 0;	
	}
	

	public function getcodeToSession() {
		$codeList = $this->get_order_by_code(array("loadflag" => "0"));
		$codeName = null;
		foreach ($codeList as $value) {
			if($codeName == $value->codeName){
				$array[$value->code] = $value->codeValue;				
			}else{
             if($codeName != NULL){
             	$data = array($codeName => $array);
             	$this->session->set_userdata($data);
             }
             //	$array  = array();
             	$array = array("" => "请选择");
             	$array[$value->code] = $value->codeValue;
			}
            $codeName = $value->codeName;
		}
		
		if($codeName != NULL){
			$data = array($codeName => $array);
			$this->session->set_userdata($data);			
		}		
	}

	public function  getcodeToArray($array=NULL){
		$arrayList = array();
		
		$codeList = $this->get_order_by_code($array);
		foreach ($codeList as $value) {
			
			$arrayList[$value->code] = $value->codeValue;
		}
		return $arrayList;
	}
	
}

/* End of file exam_m.php */
/* Location: .//D/xampp/htdocs/school/mvc/models/exam_m.php */