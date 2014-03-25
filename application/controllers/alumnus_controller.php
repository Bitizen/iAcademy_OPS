<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alumnus_Controller extends MY_Controller {

	// View My Company Details
	function index() {
		$this->load->view('alumnus/header');
		$this->load->view('alumnus/index');	
	}

	// View My Account Details
	function viewMyAccount() {

		$this->load->model('alumnus_model');
        $data['myAlumnus'] = $this->alumnus_model->viewMyAccount();

		$this->load->helper('form');
		$this->load->view('alumnus/header');
		$this->load->view('alumnus/view_my_account', $data);
	}

	// Update My Account Details
	function updateMyAlumnus() {

		$this->load->model('alumnus_model');
		$this->alumnus_model->updateUser();
        $data['myAlumnus'] = $this->alumnus_model->viewMyAccount();

		$this->load->helper('form');
		$this->load->view('alumnus/header');
		$this->load->view('alumnus/view_my_account', $data);
	}

	// View Alumni
	function viewAlumni() {
		$this->load->view('alumnus/header.php');
		$this->load->view('alumnus/view_alumni');  
    }

	// Fetches Arranged Alumnus List
	function getAlumnusList(){
		$this->load->model('alumnus_model');
		$this->alumnus_model->viewVerifiedAlumni();
	}

	// View Selected Alumnus
	function viewAlumnus() {

		$this->load->model('alumnus_model');
        $data['myAlumnus'] = $this->alumnus_model->viewAlumnus();
        $data['myCompanyNames'] = $this->alumnus_model->getAllCompanyNames();

		$this->load->helper('form');
		$this->load->view('alumnus/header.php');
		$this->load->view('alumnus/view_alumnus_profile', $data);
	}

	// View Employers
	function viewEmployers() {
		$this->load->view('alumnus/header.php');
		$this->load->view('alumnus/view_employers');  	
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
		$this->load->view('alumnus/header.php');
		$this->load->view('alumnus/view_employer', $data);
	}

	// View Careers
	function viewCareers() {
		$this->load->view('alumnus/header.php');
		$this->load->view('alumnus/view_careers');  	
	}

}