<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Intern_Controller extends MY_Controller {

	function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->helper('html');
    }

	// View My Company Details
	function index() {
		$this->load->view('intern/header');
		$this->load->view('intern/index');	
	}

	// View My Account Details
	function viewMyAccount() {

		$this->load->model('intern_model');
        $data['myIntern'] = $this->intern_model->viewMyAccount();
        $data['myInternDetails'] = $this->intern_model->viewMyIntern();

		$this->load->model('employer_model');
        $data['myEmployer'] = $this->employer_model->viewMyStudentEmployer();
        $data['myEmployerContacts'] = $this->employer_model->viewMyStudentContacts();

		$this->load->helper('form');
		$this->load->view('intern/header');
		$this->load->view('intern/view_my_account', $data);
	}

	// Update My Account Details
	function updateMyIntern() {

		$this->load->model('intern_model');
		$this->intern_model->updateUser();
        $data['myIntern'] = $this->intern_model->viewMyAccount();

		$this->load->model('employer_model');
        $data['myEmployer'] = $this->employer_model->viewMyStudentEmployer();
        $data['myEmployerContacts'] = $this->employer_model->viewMyStudentContacts();

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

	function uploadResume() {

		$this->load->helper('url');
		$this->load->model('intern_model');
		$intern = $this->intern_model->viewMyAccount();
		
		$config['file_name'] = $intern->last_name.'_'.$intern->first_name.'_Resume';
		$config['upload_path'] = './uploads/Resume/';
		$config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx';
		$config['max_size']	= '2048';
		$config['max_width']  = '5000';
		$config['max_height']  = '5000';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload()) {
			$data['uploadErrorResume'] = array('error' => $this->upload->display_errors());
			
			//$this->load->model('intern_model');
	        $data['myIntern'] = $this->intern_model->viewMyAccount();
	        $data['myInternDetails'] = $this->intern_model->viewMyIntern();

			$this->load->model('employer_model');
	        $data['myEmployer'] = $this->employer_model->viewMyStudentEmployer();
	        $data['myEmployerContacts'] = $this->employer_model->viewMyStudentContacts();

			$this->load->helper('form');
			$this->load->view('intern/header');
			$this->load->view('intern/view_my_account', $data);
		}
		else {

			// Output Upload Success
			$data['uploadSuccess'] = array('upload_success' => $this->upload->data());

			// Update Inters's Resume Path
			$sql = "CALL updateResumePath(?,?)";

			$user = $this->ion_auth->user()->row();
			$student = $user->username;

			$parameters = array(
				'username' => $student
				, 'filePath' => "uploads/Resume/".$data['uploadSuccess']['upload_success']['file_name']
			);

			$dataQ = $this->db->query($sql, $parameters);

			// Load Page
			//$this->load->model('intern_model');
	        $data['myIntern'] = $this->intern_model->viewMyAccount();
	        $data['myInternDetails'] = $this->intern_model->viewMyIntern();

			$this->load->model('employer_model');
	        $data['myEmployer'] = $this->employer_model->viewMyStudentEmployer();
	        $data['myEmployerContacts'] = $this->employer_model->viewMyStudentContacts();

			$this->load->helper('form');
			$this->load->view('intern/header');
			$this->load->view('intern/view_my_account', $data);
		}
	}

}