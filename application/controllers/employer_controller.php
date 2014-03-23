<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EmployerController extends MY_Controller {

	// View My Company Details
	function index() {
		
		$this->load->model('EmployerModel');
        $data['myRepresentative'] = $this->EmployerModel->viewRepresentative();

		$this->load->helper('form');
		//$this->load->view('bootstrap/header.php');
		$this->load->view('employer/view_my_account', $data);
	}

	// View My Account Details
	function viewRepresentative() {

		$this->load->model('EmployerModel');
        $data['myRepresentative'] = $this->EmployerModel->viewRepresentative();

		$this->load->helper('form');
		//$this->load->view('bootstrap/header.php');
		$this->load->view('employer/view_my_account', $data);
	}

	// View My Company Details
	function viewEmployer() {
		/*if( !$this->ion_auth->in_group('employer')){
			redirect('welcome.php');
		}*/
		$this->load->model('EmployerModel');
        $data['myEmployer'] = $this->EmployerModel->viewEmployer();
        $data['myEmployerContacts'] = $this->EmployerModel->viewEmployerContacts();

		$this->load->helper('form');
		//$this->load->view('bootstrap/header.php');
		$this->load->view('employer/view_company_profile', $data);
	}

	// Update My Account Details
	function updateRepresentative() {

		$this->load->model('EmployerModel');
		$this->EmployerModel->updateRepresentative();
        $data['myRepresentative'] = $this->EmployerModel->viewRepresentative();

		$this->load->helper('form');
		$this->load->view('employer/view_my_account', $data);
	}

	// Update My Company Details
	function updateEmployer() {

		$this->load->model('EmployerModel');
		$this->EmployerModel->updateEmployer();
        $data['myEmployer'] = $this->EmployerModel->viewEmployer();
        $data['myEmployerContacts'] = $this->EmployerModel->viewEmployerContacts();

		$this->load->helper('form');
		$this->load->view('employer/view_company_profile', $data);
	}
}