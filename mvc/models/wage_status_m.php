<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class wage_status_m extends MY_Model {

	protected $_table_name = 'wage_status';
	protected $_primary_key = 'wageStatusID';
	protected $_primary_filter = 'intval';
	protected $_order_by = "yearMonth desc";

	function __construct() {
		parent::__construct();
	}

	function get_wage_status($array=NULL, $signal=FALSE) {
		$query = parent::get($array, $signal);
		return $query;
	}

	function get_order_by_wage_status($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	function insert_wage_status($array) {
		$error = parent::insert($array);
		return $this->db->insert_id();
		//return TRUE;
	}

	function update_wage_status($data, $id = NULL) {
		parent::update($data, $id);
		return $id;
	}

	function delete_wage_status($id){
		parent::delete($id);
	}

	function hash($string) {
		return parent::hash($string);
	}	
}