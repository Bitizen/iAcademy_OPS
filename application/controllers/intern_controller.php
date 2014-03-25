<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Intern_Controller extends MY_Controller {

	// View My Company Details
	function index() {
		$this->load->view('intern/header');
		$this->load->view('intern/index');	
	}

	// View My Account Details
	function viewMyAccount() {

		$this->load->model('intern_model');
        $data['myIntern'] = $this->intern_model->viewMyAccount();

		$this->load->helper('form');
		$this->load->view('intern/header');
		$this->load->view('intern/view_my_account', $data);
	}

	// Update My Account Details
	function updateMyIntern() {

		$this->load->model('intern_model');
		$this->intern_model->updateUser();
        $data['myIntern'] = $this->intern_model->viewMyAccount();

		$this->load->helper('form');
		$this->load->view('intern/header');
		$this->load->view('intern/view_my_account', $data);
	}

	// View Interns
	function viewInterns() {
		$this->load->view('intern/header.php');
		$this->load->view('intern/view_interns');  
    }

	// Fetches Arranged Intern List
	function getInternList(){
		$this->load->model('intern_model');
		$this->intern_model->viewVerifiedInterns();
	}

	// View Selected Intern
	function viewIntern() {

		$this->load->model('intern_model');
        $data['myIntern'] = $this->intern_model->viewIntern();
        $data['myCompanyNames'] = $this->intern_model->getAllCompanyNames();

		$this->load->helper('form');
		$this->load->view('intern/header.php');
		$this->load->view('intern/view_intern_profile', $data);
	}

	// View Employers
	function viewEmployers() {
		$this->load->view('intern/header.php');
		$this->load->view('intern/view_employers');  	
	}

	// Fetches Arranged Employer List
	function getEmployerList(){
		$this->load->model('employer_model');
		$this->employer_model->viewEmployers();
	}

	// View Selected Employer
	function viewEmployer() {

		$this->load->model('employer_model');
        $data['myEmployer'] = $this->employer_model->viewEmployer();
        $data['myEmployerContacts'] = $this->employer_model->viewEmployerContacts();

		$this->load->helper('form');
		$this->load->view('intern/header.php');
		$this->load->view('intern/view_employer', $data);
	}

	// View Careers
	function viewCareers() {
		$this->load->view('intern/header.php');
		$this->load->view('intern/view_careers');  	
	}

}