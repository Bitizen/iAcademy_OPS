<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EmployerController extends MY_Controller {

	// View My Company Details
	function index() {
		$this->load->model('EmployerModel');
        $data['myEmployer'] = $this->EmployerModel->viewEmployerOfRepresentative();

		$this->load->helper('form');
		$this->load->view('ViewMyCompany', $data);
	}

	// View A Company's Details
	function viewEmployer() {
		$this->load->model('EmployerModel');
        $data['myEmployer'] = $this->EmployerModel->viewEmployer();

		$this->load->helper('form');
		$this->load->view('ViewMyCompany', $data);
	}

	// View My Company Details
	function viewEmployerOfRepresentative() {
		$this->load->model('EmployerModel');
        $data['myEmployer'] = $this->EmployerModel->viewEmployerOfRepresentative();

		$this->load->helper('form');
		$this->load->view('ViewMyCompany', $data);
	}

	// Update My Company Details
	function updatEmployer() {
		$this->load->model('EmployerModel');
		$this->EmployerModel->updateEmployer();

		// Load Updated Company Details
		viewEmployer();
	}
}