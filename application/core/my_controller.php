<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->helper('url');
		
		if(!$this->ion_auth->logged_in()){
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		}
	}

}



