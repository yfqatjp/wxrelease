<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class wage_details_m extends MY_Model {

	protected $_table_name = 'wage_details';
	protected $_primary_key = 'wageDetailsID';
	protected $_primary_filter = 'intval';
	protected $_order_by = "yearMonth desc";

	function __construct() {
		parent::__construct();
	}

	function get_wage_details($array=NULL, $signal=FALSE) {
		$query = parent::get($array, $signal);
		return $query;
	}

	function get_order_by_wage_details($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	function insert_wage_details($array) {
		$error = parent::insert($array);
		return TRUE;
	}

	function update_wage_details($data, $id = NULL) {
		parent::update($data, $id);
		return $id;
	}

	function delete_wage_details($id){
		parent::delete($id);
	}

	function delete_wage_details_where($array){
		
		//$this->db->delete($array);
		
		$this->db->where($array);
		//$this->db->limit(1);
		$this->db->delete($this->_table_name);
		
		//parent::delete($id);
	}
	

	
	function hash($string) {
		return parent::hash($string);
	}	
}