<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employer_Controller extends MY_Controller {

	function __construct() {
        parent::__construct();

        $this->load->library('Datatables');
        $this->load->library('table');
        $this->load->database();
        $this->load->helper('file');
        $this->load->helper('html');
    }

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
        $data['myEmployerAffiliatedInterns'] = $this->employer_model->viewMyAffiliatedInterns();
        $data['myEmployerAffiliatedEmployees'] = $this->employer_model->viewMyAffiliatedEmployees();

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

	function uploadSECRegistration() {

		$this->load->model('employer_model');
		$companyName = $this->employer_model->getCompanyName();
		
		$config['file_name'] = $companyName->companyName.'_SEC_Registration';
		$config['upload_path'] = './uploads/SEC_Registration/';
		$config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx';
		$config['max_size']	= '2048';
		$config['max_width']  = '5000';
		$config['max_height']  = '5000';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload()) {
			$data['uploadErrorSEC'] = array('error' => $this->upload->display_errors());
				
			$this->load->model('employer_model');
	        $data['myEmployer'] = $this->employer_model->viewEmployer();
	        $data['myEmployerContacts'] = $this->employer_model->viewEmployerContacts();
	        $data['myEmployerAffiliatedInterns'] = $this->employer_model->viewAffiliatedInterns();
	        $data['myEmployerAffiliatedEmployees'] = $this->employer_model->viewAffiliatedEmployees();

			$this->load->helper('form');
			$this->load->view('employer/header.php');
			$this->load->view('employer/view_company_profile', $data);
		}
		else {

			// Output Upload Success
			$data['uploadSuccessSEC'] = array('upload_success' => $this->upload->data());

			// Update Employer's File Path
			$sql = "CALL updateSECRegistrationFilePath(?,?)";

			$user = $this->ion_auth->user()->row();
			$representative = $user->username;

			$parameters = array(
				'username' => $representative
				, 'filePath' => "uploads/SEC_Registration/".$data['uploadSuccessSEC']['upload_success']['file_name']
			);

			$dataQ = $this->db->query($sql, $parameters);

			// Load Page
			$this->load->model('employer_model');
	        $data['myEmployer'] = $this->employer_model->viewEmployer();
	        $data['myEmployerContacts'] = $this->employer_model->viewEmployerContacts();
	        $data['myEmployerAffiliatedInterns'] = $this->employer_model->viewAffiliatedInterns();
	        $data['myEmployerAffiliatedEmployees'] = $this->employer_model->viewAffiliatedEmployees();

			$this->load->helper('form');
			$this->load->view('employer/header.php');
			$this->load->view('employer/view_company_profile', $data);
		}
	}


}