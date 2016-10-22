<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Controller extends MY_Controller {
/*
| -----------------------------------------------------
| PRODUCT NAME: 	SCHOOL MANAGEMENT
| -----------------------------------------------------
| AUTHOR:			TEAM
| -----------------------------------------------------
| EMAIL:			
| -----------------------------------------------------
| COPYRIGHT:		RESERVED BY Livetech
| -----------------------------------------------------
| WEBSITE:			
| -----------------------------------------------------
*/

	function __construct () {
		parent::__construct();
		$this->load->model("signin_m");
	
		$this->load->model("site_m");
		$this->data["siteinfos"] = $this->site_m->get_site(1, "TRUE");
		$this->load->library("session");
		$this->load->helper('language');
		$this->load->helper('date');
		$this->load->helper('form');
		$this->load->library('form_validation');

		/* Alert System Start.........*/
		$this->data['all'] = array();
		$this->data['alert'] = array();
		$i = 0;

		$this->data['alert'];		
		/* Alert System End.........*/
		


		$language = $this->session->userdata('lang');
		$this->lang->load('topbar_menu', $language);

		$exception_uris = array(
			"signin/index",
			"signin/signout"
		);

		if(in_array(uri_string(), $exception_uris) == FALSE) {
			if($this->signin_m->loggedin() == FALSE) {
				redirect(base_url("signin/index"));
			}
		}
	}
}

/* End of file Admin_Controller.php */
/* Location: .//D/xampp/htdocs/school/mvc/libraries/Admin_Controller.php */
