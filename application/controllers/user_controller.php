<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Controller extends MY_Controller {
	
	// Redirects users to controllers based on access level
	function index(){
		if ($this->ion_auth->in_group('admin')){
			$this->load->view('header');
			$this->load->view('admin/index');	
		} else if ($this->ion_auth->in_group('employer')){
			$this->load->view('header');
			$this->load->view('employer/index');	
		} else if ($this->ion_auth->in_group('encoder')){
			$this->load->view('header.php');
			$this->load->view('encoder/index');
		} else if ($this->ion_auth->in_group('alumnus')){
			$this->load->view('header');
			$this->load->view('alumnus/index');	
		} else if ($this->ion_auth->in_group('intern')){
			$this->load->view('header');
			$this->load->view('intern/index');	
		}
	}

/*
	// Loads a view containing current user's account details
	function account(){
		$this->load->model('User_Model');
		$data['user'] = $this->User_Model->viewUser();	

		$this->load->helper('form');

		$this->load->view('bootstrap/header.php');
		$this->load->view('user/view_my_account', $data);	
	}

	// INT $id is the userID of a specified user
	function profile($id){

		if(!$id){
			redirect('welcome.php');
		}

		$this->load->model('User_Model');
		$data['user'] = $this->User_Model->viewSpecificUser($id);	

		$this->load->helper('form');

		$this->load->view('user/view_my_account', $data);	
	}

	// Updates current user's account
	function updateUser(){

		$this->load->model('User_Model');
		$this->User_Model->updateUser();
        $data['user'] = $this->User_Model->viewUser();

		$this->load->helper('form');

		$this->load->view('bootstrap/header.php');
		$this->load->view('user/view_my_account', $data);
	}

*/
	
}