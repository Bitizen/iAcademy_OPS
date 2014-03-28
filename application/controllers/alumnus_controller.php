<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alumnus_Controller extends MY_Controller {

	function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->helper('html');
    }

	// View My Company Details
	function index() {
		$this->load->view('alumnus/header');
		$this->load->view('alumnus/index');	
	}

	// View My Account Details
	function viewMyAccount() {

		$this->load->model('alumnus_model');
        $data['myAlumnus'] = $this->alumnus_model->viewMyAccount();
        $data['myAlumnusDetails'] = $this->alumnus_model->viewMyAlumnus();

		$this->load->model('employer_model');
        $data['myEmployer'] = $this->employer_model->viewMyStudentEmployer();
        $data['myEmployerContacts'] = $this->employer_model->viewMyStudentContacts();

		$this->load->helper('form');
		$this->load->view('alumnus/header');
		$this->load->view('alumnus/view_my_account', $data);
	}

	// Update My Account Details
	function updateMyAlumnus() {

		$this->load->model('alumnus_model');
		$this->alumnus_model->updateUser();
        $data['myAlumnus'] = $this->alumnus_model->viewMyAccount();
        $data['myAlumnusDetails'] = $this->alumnus_model->viewMyAlumnus();
		
		$this->load->model('employer_model');
        $data['myEmployer'] = $this->employer_model->viewMyStudentEmployer();
        $data['myEmployerContacts'] = $this->employer_model->viewMyStudentContacts();

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

	function uploadResume() {

		$this->load->helper('url');
		$this->load->model('alumnus_model');
		$alumnus = $this->alumnus_model->viewMyAccount();
		
		$config['file_name'] = $alumnus->last_name.'_'.$alumnus->first_name.'_Resume';
		$config['upload_path'] = './uploads/Resume/';
		$config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx';
		$config['max_size']	= '2048';
		$config['max_width']  = '5000';
		$config['max_height']  = '5000';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload()) {
			$data['uploadErrorResume'] = array('error' => $this->upload->display_errors());
			
			//$this->load->model('alumnus_model');
	        $data['myAlumnus'] = $this->alumnus_model->viewMyAccount();
	        $data['myAlumnusDetails'] = $this->alumnus_model->viewMyIntern();

			$this->load->model('employer_model');
	        $data['myEmployer'] = $this->employer_model->viewMyStudentEmployer();
	        $data['myEmployerContacts'] = $this->employer_model->viewMyStudentContacts();

			$this->load->helper('form');
			$this->load->view('alumnus/header');
			$this->load->view('alumnus/view_my_account', $data);
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
			//$this->load->model('alumnus_model');
	        $data['myAlumnus'] = $this->alumnus_model->viewMyAccount();
	        $data['myAlumnusDetails'] = $this->alumnus_model->viewMyIntern();

			$this->load->model('employer_model');
	        $data['myEmployer'] = $this->employer_model->viewMyStudentEmployer();
	        $data['myEmployerContacts'] = $this->employer_model->viewMyStudentContacts();

			$this->load->helper('form');
			$this->load->view('alumnus/header');
			$this->load->view('alumnus/view_my_account', $data);
		}
	}

}