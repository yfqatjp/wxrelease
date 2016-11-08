<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment_m extends MY_Model {

	protected $_table_name = 'payment';
	protected $_primary_key = 'paymentID';
	protected $_primary_filter = 'intval';
	protected $_order_by = "paymentID desc";

	function __construct() {
		parent::__construct();
	}

	function get_payment($array=NULL, $signal=FALSE) {
		$query = parent::get($array, $signal);
		return $query;
	}

	function get_order_by_payment($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	// public function get_routine_group_by($id, $sectionID = NULL){
	public function get_groupBypaymentclass($array=NULL){		
		$this->db->select('paymentclass');
		$this->db->from('payment');
		$this->db->where($array);
		$this->db->group_by('paymentclass');
		$query = $this->db->get();
		return $query->result();
	}	

	public function get_paymentclass_IN($array=NULL){
		$this->db->select('*');
		$this->db->from('payment');
		$this->db->where($array);
		$this->db->where_in('paymentclass', array('2','3'));
		$query = $this->db->get();
		return $query->result();
	}	
	
	function get_payment_where($date_from=NULL, $date_to=NULL) {
		$this->db->select('invoice.amount as amount ,
				           invoice.invoiceID as invoiceID ,
				           invoice.student as student ,
				           invoice.studentID as studentID ,
				           payment.paymentclass as paymentclass,
				           payment.paymenttype as paymenttype,
				           payment.paymentamount as paymentamount,
				           payment.principal as principal,
				           payment.paymentdate as paymentdate');
		$this->db->from('payment');
		
		$this->db->join('invoice', 'invoice.invoiceID = payment.invoiceID');
		if($date_from){
			$this->db->where("payment.paymentdate >=", date("Y-m-d", strtotime($date_from)));
		}
		if($date_to){
			$this->db->where("payment.paymentdate <=", date("Y-m-d", strtotime($date_to)));
		}

		$query = $this->db->get();
		return $query->result();
	}
	
	
	
	function get_single_payment($array=NULL) {
		$query = parent::get_single($array);
		return $query;
	}

	function insert_payment($array) {
		$error = parent::insert($array);
		return TRUE;
	}

	function update_payment($data, $id = NULL) {
		parent::update($data, $id);
		return $id;
	}

	public function delete_payment($id){
		parent::delete($id);
	}
}

/* End of file payment_m.php */
/* Location: .//D/xampp/htdocs/school/mvc/models/payment_m.php */