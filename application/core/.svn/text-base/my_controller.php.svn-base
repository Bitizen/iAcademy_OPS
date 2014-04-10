<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->helper('url');
		

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
		$this->load->helper('language');

		if(!$this->ion_auth->logged_in()){
			//redirect to the login page
			redirect('auth/login', 'refresh');
		}
	}



}//end



