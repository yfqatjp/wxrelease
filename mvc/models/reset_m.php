<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class reset_m extends CI_Model {

	protected $_table_name = 'reset';
	protected $_primary_key = 'resetID';
	protected $_primary_filter = 'intval';
	protected $_order_by = "resetID desc";


	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
	}
	
	public function get_reset($id = NULL, $single = FALSE){
		
		if ($id != NULL) {
			$filter = $this->_primary_filter;
			$id = $filter($id);
			$this->db->where($this->_primary_key, $id);
			$method = 'row';
		}
		elseif($single == TRUE) {
			$method = 'row';
		}
		else {
			$method = 'result';
		}
		
		if (!count($this->db->ar_orderby)) {
			$this->db->order_by($this->_order_by);
		}
		return $this->db->get($this->_table_name)->$method();
	}

	function get_order_by_reset($array=NULL) {
		if($array != NULL) {
			$this->db->select()->from($this->_table_name)->where($array)->order_by($this->_order_by);
			$query = $this->db->get();
			return $query->result();
		} else {
			$this->db->select()->from($this->_table_name)->order_by($this->_order_by);
			$query = $this->db->get();
			return $query->result();
		}
	}

	function get_single_reset($array=NULL) {
		if($array != NULL) {
			$this->db->select()->from($this->_table_name)->where($array);
			$query = $this->db->get();
			return $query->row();
		} else {
			$this->db->select()->from($this->_table_name)->order_by($this->_order_by);
			$query = $this->db->get();
			return $query->result();
		}
	}

	function insert_reset($array) {
		$this->db->insert($this->_table_name, $array);
		$id = $this->db->insert_id();
		return $id;	
	}

	function update($data, $id = NULL) {
		$filter = $this->_primary_filter;
		$id = $filter($id);
		$this->db->set($data);
		$this->db->where($this->_primary_key, $id);
		$this->db->update($this->_table_name);
	}

	public function delete($id){
		$filter = $this->_primary_filter;
		$id = $filter($id);
		
		if (!$id) {
			return FALSE;
		}
		$this->db->where($this->_primary_key, $id);
		$this->db->limit(1);
		$this->db->delete($this->_table_name);
		return true;
	}

	public function hash($string) {
		return hash("sha512", $string . config_item("encryption_key"));
	}


	function get_table_users($table, $email) {
		$user = $this->db->get_where($table, array("email" => $email));
		return $user->row();
	}

	function get_admin() {
		$query = $this->db->get_where('setting', array('SettingID' => 1));
		return $query->row();
	}

	
	public function resetURLSend($email,$template = "RESETPWD"){
		$i = 0;
		$siteinfo = $this->get_admin();
		$tables = array('student' => 'student',  'teacher' => 'teacher',  'systemadmin' => 'systemadmin');
		foreach ($tables as $table) {
			$dbuser = $this->get_table_users($table, $email);
			if(count($dbuser)) {
				$reset_key = $this->hash($dbuser->usertype.$dbuser->email.$dbuser->name);
				$tmp_url = base_url("reset/password/".$reset_key);
				$array['permition'][$i] = 'yes';
			} else {
				$array['permition'][$i] = 'no';
			}
			$i++;
		}
				 
		if(in_array('yes', $array['permition'])) {
			$dbreset = $this->get_single_reset(array('email' => $email));
	
			if(count($dbreset)) {
				if($this->delete($dbreset->resetID)) {
					$this->insert_reset(array('keyID' => $reset_key, 'email' => $email));
				} else {
					$this->session->set_flashdata('reset_error', 'reset access off!');
				}
			} else {
				$this->insert_reset(array('keyID' => $reset_key, 'email' => $email));
			}
			
			$this->email->initialize(array(
					'protocol' => 'smtp',
					'smtp_host' => $siteinfo->smtp_host,
					'smtp_user' => $siteinfo->smtp_user,
					'smtp_pass' => $siteinfo->smtp_pass,
					'smtp_port' => $siteinfo->smtp_port,
					'smtp_crypto'  => 'ssl',
					'charset'  => 'utf-8',
					'newline' => "\r\n"
			));
			 
			 
			$this->email->from($siteinfo->email, $siteinfo->sname);
			$this->email->to($email);
			
			// パーサーロード
			$this->load->library('parser');
			
			// テンプレートに渡す値の設定
			$data = array();
			$data['mail'] = $email;
			$data['reset_url'] = $tmp_url;												
			$data['tel'] = $siteinfo->phone;
			$data['sitename'] = $siteinfo->sname;
			$data['adress'] = $siteinfo->address;
			 
			if($template == "RESETPWD"){
				$this->email->subject('维新学院管理系统账目重置密码');
				// テンプレートに変数をアサイン
					
				$message = $this->parser->parse('template/mail/resetpw', $data, TRUE);
			
			}else{
				$this->email->subject('维新学院管理系统账户激活');
				$data['login_url'] =  base_url("signin/index/");
				// テンプレートに変数をアサイン
					
				$message = $this->parser->parse('template/mail/activeuser', $data, TRUE);
			}
				
	
			$this->email->message($message);

			//$this->email->send();
			//echo $this->email->print_debugger();
			
			if($this->email->send()) {
				return 1;//发送成功
				 
			} else {
				
				return 2; //发送失败
			}
		} else {
			return 3; //邮箱不存在
		}
	}	
	
	
	
	


	/* infinite code starts here */
}

/* End of file student_m.php */
/* Location: .//D/xampp/htdocs/school/mvc/models/student_m.php */