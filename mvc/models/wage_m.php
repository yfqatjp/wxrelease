<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class wage_m extends MY_Model {

	protected $_table_name = 'wage';
	protected $_primary_key = 'wageID';
	protected $_primary_filter = 'intval';
	protected $_order_by = "yearMonth desc";

	function __construct() {
		parent::__construct();
	}

	function get_wage($array=NULL, $signal=FALSE) {
		$query = parent::get($array, $signal);
		return $query;
	}

	function get_order_by_wage($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	function insert_wage($array) {
		$error = parent::insert($array);
		return $this->db->insert_id();
		//return TRUE;
	}

	function update_wage($data, $id = NULL) {
		parent::update($data, $id);
		return $id;
	}

	function delete_wage($id){
		parent::delete($id);
	}

	function hash($string) {
		return parent::hash($string);
	}	
	
	function quarter_round($round_time,$plus=0){
		# 分だけ取り出す
		$time_array = explode(":",$round_time);
		$round_time = $time_array[1];
		$quarter_array = array(0,15,30,45,60);
		$switch = false;
		$next_value = 0;
		foreach($quarter_array as $value){
			$prev_value = $next_value;
			$next_value = $value;
			if($prev_value < $round_time and $round_time < $next_value){
				$round_time = $prev_value;
				$switch = true;
			}
		}
	
		# 開始時間は15分単位で切り捨ててまた15分を足す
		if($plus and $switch) $round_time += 15;
	
		# 元の形に戻す
		//$round_time = $time_array[0].":".$round_time.":00";
		$round_time = $time_array[0] + $round_time/60;
		return $round_time;
	}	
	
}