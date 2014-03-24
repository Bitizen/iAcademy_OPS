<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employer_Controller extends MY_Controller {

	// View My Company Details
	function index() {
		$this->load->view('employer/header');
		$this->load->view('employer/index');	
	}

	// View My Account Details
	function viewMyAccount() {

		$this->load->model('employer_model');
        $data['myRepresentative'] = $this->employer_model->viewMyRepresentative();

		$this->load->helper('form');
		$this->load->view('employer/header');
		$this->load->view('employer/view_my_account', $data);
	}

	// View My Company Details
	function viewMyEmployer() {
		/*if( !$this->ion_auth->in_group('employer')){
			redirect('welcome.php');
		}*/
		$this->load->model('employer_model');
        $data['myEmployer'] = $this->employer_model->viewMyEmployer();
        $data['myEmployerContacts'] = $this->employer_model->viewMyEmployerContacts();

		$this->load->helper('form');
		$this->load->view('employer/header');
		$this->load->view('employer/view_company_profile', $data);
	}

	// Update My Account Details
	function updateMyRepresentative() {

		$this->load->model('employer_model');
		$this->employer_model->updateMyRepresentative();
        $data['myRepresentative'] = $this->employer_model->viewMyRepresentative();

		$this->load->helper('form');
		$this->load->view('employer/header');
		$this->load->view('employer/view_my_account', $data);
	}

	// Update My Company Details
	function updateMyEmployer() {

		$this->load->model('employer_model');
		$this->employer_model->updateMyEmployer();
        $data['myEmployer'] = $this->employer_model->viewMyEmployer();
        $data['myEmployerContacts'] = $this->employer_model->viewMyEmployerContacts();

		$this->load->helper('form');
		$this->load->view('employer/header');
		$this->load->view('employer/view_company_profile', $data);
	}

	// View Interns
	function viewInterns() {
		$this->load->view('employer/header.php');
		$this->load->view('employer/view_interns');  
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
		$this->load->view('employer/header.php');
		$this->load->view('employer/view_intern_profile', $data);
	}
	// View Alumni
	function viewAlumni() {
		$this->load->view('employer/header.php');
		$this->load->view('employer/view_alumni');  
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
		$this->load->view('employer/header.php');
		$this->load->view('employer/view_alumnus_profile', $data);
	}
}