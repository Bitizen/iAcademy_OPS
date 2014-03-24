<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Encoder_Controller extends MY_Controller {
	
	function __construct() {
        parent::__construct();

        $this->load->library('Datatables');
        $this->load->library('table');
        $this->load->database();
        $this->load->helper('file');
        $config['allowed_types'] = 'csv';
    }

 	function index() {
		$this->load->model('encoder_model');
		$this->load->helper('form');
		$data['user'] = $this->encoder_model->viewMyAccount();	

		$this->load->view('encoder/header.php');
		$this->load->view('encoder/index', $data);
	}

	// View My Account Details
	function viewMyAccount() {
		$this->load->model('encoder_model');
		$this->load->helper('form');
		$data['user'] = $this->encoder_model->viewMyAccount();	

		$this->load->view('encoder/header.php');
		$this->load->view('encoder/index', $data);
	}

	// Updates My Personal Details
	function updateUser() {

		$this->load->model('encoder_model');
		$this->load->helper('form');
		$this->encoder_model->updateUser();
		$data['user'] = $this->encoder_model->viewMyAccount();	

		$this->load->view('encoder/header.php');
		$this->load->view('encoder/index', $data);
	}
	
	// View Users
	function viewUsers() {
		$this->load->view('encoder/header.php');
		$this->load->view('encoder/view_users');  
	} 

	// Fetches Arranged User List
	function getUserList() {
		$this->load->model('encoder_model');
		$this->encoder_model->viewUsers();
	} 

	// View Interns
	function viewInterns() {
		$this->load->view('encoder/header.php');
		$this->load->view('encoder/view_interns');  
    }

	// Fetches Arranged Intern List
	function getInternList(){
		$this->load->model('intern_model');
		$this->intern_model->viewInterns();
	}

	// View Selected Intern
	function viewIntern() {

		$this->load->model('intern_model');
        $data['myIntern'] = $this->intern_model->viewIntern();
        $data['myCompanyNames'] = $this->intern_model->getAllCompanyNames();

		$this->load->helper('form');
		$this->load->view('encoder/header.php');
		$this->load->view('encoder/view_intern_profile', $data);
	}

	// Update Intern
	function updateIntern() {

		$this->load->model('intern_model');
		$this->intern_model->updateIntern();
        $data['myIntern'] = $this->intern_model->viewIntern();
        $data['myCompanyNames'] = $this->intern_model->getAllCompanyNames();

		$this->load->helper('form');
		$this->load->view('encoder/view_intern_profile', $data);
	}

	// Load Add Intern Page
	function loadAddInternView() {
		$this->load->view('encoder/header.php');
		$this->load->view('encoder/add_intern');  
	}

	// Add Intern
	function addIntern() {
		$this->load->model('intern_model');
		$this->intern_model->createStudent();
		$this->load->view('encoder/header.php');
		$this->load->view('encoder/add_intern'); 
	}

	// Load Add Interns By Bulk Page
	function loadAddInternsByBulk(){
		$this->load->view('encoder/header.php');
		$this->load->view('encoder/add_interns_by_bulk');  
	}

	function uploadInternsByBulk() {
		$config['upload_path'] = 'application/views/uploads/';
		$config['allowed_types'] = 'csv';
		$config['max_size']	= '100';
		$config['max_size'] = '5000';
    	$config['file_name'] = 'interns_upload_'.time();
    	$replace = '"';
      	$with = ' ';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload() ) {
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('encoder/header.php');
			$this->load->view('encoder/add_interns_by_bulk', $error);
		}
		else {
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('encoder/header.php');
			$this->load->view('encoder/view_interns');
			
			$this->load->library('csvreader');
		    $filePath1 = 'application/views/uploads/';
		    $filePath2 = $data['upload_data']['file_name'];
		    $filePath = $filePath1 . $filePath2;
		    $data['csvData'] = $this->csvreader->parse_file($filePath);
		    foreach($data['csvData'] as $cd){
               $results_array = array(
               		   'firstName' => str_replace($replace, $with, $cd['firstName']),
                       'lastName' => str_replace($replace, $with, $cd['lastName']),
                       'courseID' => str_replace($replace, $with, $cd['courseID']),
                       'currentEmployerID' => str_replace($replace, $with, $cd['currentEmployerID']),
                       'mobile' => str_replace($replace, $with, $cd['mobile']),
                       'emailAddress' => str_replace($replace, $with, $cd['emailAddress'])
                   );                  
	           $this->db->set($results_array);
	           $this->db->insert('students');
           }
		}
	}

	// View Employers
	function viewEmployers() {
		$this->load->view('encoder/header.php');
		$this->load->view('encoder/view_employers');  	
	}

	// Fetches Arranged Employer List
	function getEmployerList(){
		$this->load->model('employer_model');
		$this->employer_model->viewEmployers();
	}

	// Generate CSV Report for Employers
	function generateReportForEmployers() {
		$this->load->model('employer_model');
		$this->employer_model->generateReportForEmployers();
		//$this->load->view('employer/viewAllEmployers');  
	}

	// View Selected Employer
	function viewEmployer() {

		$this->load->model('employer_model');
        $data['myEmployer'] = $this->employer_model->viewEmployer();
        $data['myEmployerContacts'] = $this->employer_model->viewEmployerContacts();

		$this->load->helper('form');
		$this->load->view('encoder/header.php');
		$this->load->view('encoder/view_employer', $data);
	}

	// Update Employer
	function updateEmployer() {

		$this->load->model('employer_model');
		$this->employer_model->updateEmployer();
        $data['myEmployer'] = $this->employer_model->viewEmployer();
        $data['myEmployerContacts'] = $this->employer_model->viewEmployerContacts();

		$this->load->helper('form');
		$this->load->view('encoder/header.php');
		$this->load->view('encoder/view_employer', $data);
	}

	// Load Add Employer View
	function addEmployer() {
		$this->load->view('encoder/header.php');
		$this->load->view('encoder/add_employer'); 
	}

	// Load Add Job Opening View
	function addCareer() {
		$this->load->view('encoder/header.php');
		$this->load->view('encoder/add_career'); 
	}

	// View Careers
	function viewCareers() {
		//$this->load->model('career_model');
		//$this->load->helper('form');
		//$data['careers'] = $this->career_model->viewCareers();	

		$this->load->view('encoder/header.php');
		$this->load->view('encoder/view_careers');
		//$this->load->view('encoder/view_careers', $data);
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

			$this->load->view('encoder/header.php');
			$this->load->view('encoder/view_employer', $data);
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
				, 'filePath' => "uploads\SEC_Registration\\".$data['uploadSuccessSEC']['upload_success']['file_name']
			);

			$dataQ = $this->db->query($sql, $parameters);

			// Load Page
			$this->load->model('employer_model');
	        $data['myEmployer'] = $this->employer_model->viewEmployer();
        	$data['myEmployerContacts'] = $this->employer_model->viewEmployerContacts();

			$this->load->view('encoder/header.php');
			$this->load->view('encoder/view_employer', $data);
		}
	}

	function uploadCompanyLogo() {

		$config['upload_path'] = './uploads/Company_Logos/';
		$config['allowed_types'] = 'gif|jpg|png|pdf';
		$config['max_size']	= '2048';
		$config['max_width']  = '5000';
		$config['max_height']  = '5000';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload()) {
			$data['uploadErrorLogo'] = array('error' => $this->upload->display_errors());
			
			$this->load->model('employer_model');
	        $data['myEmployer'] = $this->employer_model->viewEmployer();
        	$data['myEmployerContacts'] = $this->employer_model->viewEmployerContacts();

			$this->load->view('encoder/header.php');
			$this->load->view('encoder/view_employer', $data);
		}
		else {

			// Output Upload Success
			$data['uploadSuccessLogo'] = array('upload_success' => $this->upload->data());

			// Update Employer's File Path
			$sql = "CALL updateCompanyLogoFilePath(?,?)";

			$user = $this->ion_auth->user()->row();
			$representative = $user->username;

			$parameters = array(
				'username' => $representative
				, 'filePath' => "uploads\Company_Logos\\".$data['uploadSuccessLogo']['upload_success']['file_name']
			);

			$dataQ = $this->db->query($sql, $parameters);

			// Load Page
			$this->load->model('employer_model');
	        $data['myEmployer'] = $this->employer_model->viewEmployer();
        	$data['myEmployerContacts'] = $this->employer_model->viewEmployerContacts();

			$this->load->view('encoder/header.php');
			$this->load->view('encoder/view_employer', $data);
		}
	}

	function uploadOtherDocuments() {

		$config['upload_path'] = './uploads/Other_Documents/';
		$config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx|txt|xls|xlsx|ppt|pptx';
		$config['max_size']	= '2048';
		$config['max_width']  = '5000';
		$config['max_height']  = '5000';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload()) {
			$data['uploadErrorOther'] = array('error' => $this->upload->display_errors());
			
			$this->load->model('employer_model');
	        $data['myEmployer'] = $this->employer_model->viewEmployer();
        	$data['myEmployerContacts'] = $this->employer_model->viewEmployerContacts();

			$this->load->view('encoder/header.php');
			$this->load->view('encoder/view_employer', $data);
		}
		else {

			// Output Upload Success
			$data['uploadSuccessOther'] = array('upload_success' => $this->upload->data());

			// Update Employer's File Path
			$sql = "CALL updateOtherDocumentsFilePath(?,?)";

			$user = $this->ion_auth->user()->row();
			$representative = $user->username;

			$parameters = array(
				'username' => $representative
				, 'filePath' => "uploads\Other_Documents\\".$data['uploadSuccessOther']['upload_success']['file_name']
			);

			$dataQ = $this->db->query($sql, $parameters);

			// Load Page
			$this->load->model('employer_model');
	        $data['myEmployer'] = $this->employer_model->viewEmployer();
        	$data['myEmployerContacts'] = $this->employer_model->viewEmployerContacts();

			$this->load->view('encoder/header.php');
			$this->load->view('encoder/view_employer', $data);
		}
	}

	// View Alumni
	function viewAlumni() {
		$this->load->view('encoder/header.php');
		$this->load->view('encoder/view_alumni');  
    }

	// Fetches Arranged Alumnus List
	function getAlumnusList(){
		$this->load->model('alumnus_model');
		$this->alumnus_model->viewAlumni();
	}

	// View Selected Alumnus
	function viewAlumnus() {

		$this->load->model('alumnus_model');
        $data['myAlumnus'] = $this->alumnus_model->viewAlumnus();
        $data['myCompanyNames'] = $this->alumnus_model->getAllCompanyNames();

		$this->load->helper('form');
		$this->load->view('encoder/header.php');
		$this->load->view('encoder/view_alumnus_profile', $data);
	}

	// Update Alumnus
	function updateAlumnus() {

		$this->load->model('alumnus_model');
		$this->alumnus_model->updateAlumnus();
        $data['myAlumnus'] = $this->alumnus_model->viewAlumnus();
        $data['myCompanyNames'] = $this->alumnus_model->getAllCompanyNames();

		$this->load->helper('form');
		$this->load->view('encoder/view_alumnus_profile', $data);
	}

	// Load Add Alumnus Page
	function loadAddAlumnusView() {
		$this->load->view('encoder/header.php');
		$this->load->view('encoder/add_alumnus');  
	}

	// Add Alumnus
	function addAlumnus() {
		$this->load->model('alumnus_model');
		$this->alumnus_model->createStudent();
		$this->load->view('encoder/header.php');
		$this->load->view('encoder/add_alumnus'); 
	}

	// Load Add Alumni By Bulk Page
	function loadAddAlumniByBulk(){
		$this->load->view('encoder/header.php');
		$this->load->view('encoder/add_alumni_by_bulk');  
	}

	function uploadAlumniByBulk() {
		$config['upload_path'] = 'application/views/uploads/';
		$config['allowed_types'] = 'csv';
		$config['max_size']	= '100';
		$config['max_size'] = '5000';
    	$config['file_name'] = 'interns_upload_'.time();
    	$replace = '"';
      	$with = ' ';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload() ) {
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('encoder/header.php');
			$this->load->view('encoder/add_alumni_by_bulk', $error);
		}
		else {
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('encoder/header.php');
			$this->load->view('encoder/view_interns');
			
			$this->load->library('csvreader');
		    $filePath1 = 'application/views/uploads/';
		    $filePath2 = $data['upload_data']['file_name'];
		    $filePath = $filePath1 . $filePath2;
		    $data['csvData'] = $this->csvreader->parse_file($filePath);
		    foreach($data['csvData'] as $cd){
               $results_array = array(
               		   'firstName' => str_replace($replace, $with, $cd['firstName']),
                       'lastName' => str_replace($replace, $with, $cd['lastName']),
                       'courseID' => str_replace($replace, $with, $cd['courseID']),
                       'currentEmployerID' => str_replace($replace, $with, $cd['currentEmployerID']),
                       'mobile' => str_replace($replace, $with, $cd['mobile']),
                       'emailAddress' => str_replace($replace, $with, $cd['emailAddress'])
                   );                  
	           $this->db->set($results_array);
	           $this->db->insert('students');
           }
		}
	}

	////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////

	/*
	// Update current user
	function updateUser2() {
		
		$user = $this->ion_auth->user()->row();
		$username = $user->username;

		$sql = "CALL updateUser(?,?,?,?,?,?,?,?,?)";

		$parameters = array(
			'username' => $username
			, 'firstName' => $this->input->post('iFirstName')
			, 'middleName' => $this->input->post('iMiddleName')
			, 'lastName' => $this->input->post('iLastName')
			, 'position' => $this->input->post('iPosition')
			, 'telephone' => $this->input->post('iLandline')
			, 'mobile' => $this->input->post('iMobile')
			, 'email' => $this->input->post('iEmail')
			, 'dateOfBirth' => $this->input->post('iDateOfBirth')
		);


		$data = $this->db->query($sql, $parameters);
	}

	// View specified user
	// Grant access to: superadmin, admin, employer
	function viewSpecificUser($id) {
		$user = $this->ion_auth->user($id)->row();

		if(!$user){
			redirect('welcome.php');
		}

		$parameter = $user->username;
		$sql = "CALL viewUser(?)";

		$data = $this->db->query($sql, $parameter);
		$this->db->reconnect();
		$row = $data->row();

		return $row;
	}


	//loads view of list of admins
	public function getListOfAdmins() {
		$this->load->view('encoder/viewAllAdministrators');  		  
	}

	//loads view of list of employers
	public function getListOfEmployers2() {
		$this->load->view('employer/viewAllEmployers');  	
	}

	//fetch list of employers
	public function getEmployerDataByAjax() {
		$this->load->model('employer_model');
		$this->employer_model->viewAllEmployers();
	}

	//generate CSV report for view employers function
	public function generateReportForEmployers2() {
		$this->load->model('employer_model');
		$this->employer_model->genRepForEmployersView();
		//$this->load->view('employer/viewAllEmployers');  
	}

	//loads view of list of interns
	public function getListOfInterns() {
		$this->load->view('intern/viewAllInterns');  
	}

	//fetch list of interns
	public function getInternDataByAjax() {
		$this->load->model('intern_model');
		$this->intern_model->viewAllInterns();
	}

	
	public function getIntern($int)
	{
		$this->input->get('int', TRUE);
		$this->load->model('intern_model');
		$data['result'] = $this->intern_model->viewAnIntern($int);
		$this->load->helper('form');
		$this->load->view('intern/viewIntern', $data);
	}


	public function showInterns() {
		$this->load->model('intern_model');
        $data['students'] = $this->intern_model->viewStudents();
      	$this->load->helper('form');
        $this->load->view('intern/viewInterns', $data);
    }

    function showIntern() {
		$this->load->model('intern_model');
		$data['studentChosen'] = $this->intern_model->viewStudent();
		//$this->load->helper('form');
        $this->load->view('intern/viewIntern', $data);
	}
	*/
}
?>