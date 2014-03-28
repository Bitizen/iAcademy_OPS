<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Administrator_Controller extends MY_Controller {
	
	function __construct() {
        parent::__construct();

        $this->load->library('Datatables');
        $this->load->library('table');
        $this->load->database();
        $this->load->helper('file');
        $this->load->helper('html');
        $config['allowed_types'] = 'csv';
    }

 	function index() {
		//$this->load->model('administrator_model');
		//$this->load->helper('form');
		//$data['announcements'] = $this->administrator_model->viewAnnoucements();	

		$this->load->view('admin/header');
		$this->load->view('admin/index');	
		//$this->load->view('admin/index', $data);	
	}

	// View My Account Details
	function viewMyAccount() {
		$this->load->model('administrator_model');
		$this->load->helper('form');
		$data['user'] = $this->administrator_model->viewMyAccount();	

		$this->load->view('admin/header.php');
		$this->load->view('admin/view_my_account', $data);
	}

	// Updates My Personal Details
	function updateUser() {

		$this->load->model('administrator_model');
		$this->load->helper('form');
		$this->administrator_model->updateUser();
		$data['user'] = $this->administrator_model->viewMyAccount();	

		$this->load->view('admin/header.php');
		$this->load->view('admin/view_my_account', $data);
	}
	
	// View Users
	function viewUsers() {
		$this->load->view('admin/header.php');
		$this->load->view('admin/view_users');  
	} 

	// Fetches Arranged User List
	function getUserList() {
		$this->load->model('administrator_model');
		$this->administrator_model->viewUsers();
	} 

	// View Interns
	function viewInterns() {
		//$this->load->model('intern_model');
        //$data['allInterns'] = $this->intern_model->viewInterns();        
		//$this->load->helper('form');
		$this->load->view('admin/header.php');
		$this->load->view('admin/view_interns');
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
    	$data['myEmployerContacts'] = $this->intern_model->viewInternContacts();

		$this->load->helper('form');
		$this->load->view('admin/header.php');
		$this->load->view('admin/view_intern_profile', $data);
	}

	// Update Intern
	function updateIntern() {

		$this->load->model('intern_model');
		$this->intern_model->updateIntern();
        $data['myIntern'] = $this->intern_model->viewIntern();
        $data['myCompanyNames'] = $this->intern_model->getAllCompanyNames();
    	$data['myEmployerContacts'] = $this->intern_model->viewInternContacts();

		$this->load->helper('form');
		$this->load->view('admin/header.php');
		$this->load->view('admin/view_intern_profile', $data);
	}

	/* Load Add Intern Page
	function loadAddInternView() {
		$this->load->view('admin/header.php');
		$this->load->view('admin/add_intern');  
	}*/

	/* Add Intern
	function addIntern() {
		$this->load->model('intern_model');
		$this->intern_model->createStudent();
		$this->load->view('admin/header.php');
		$this->load->view('admin/add_intern'); 
	}*/

	// Load Add Interns By Bulk Page
	function loadAddInternsByBulk(){
		$this->load->view('admin/header.php');
		$this->load->view('admin/add_interns_by_bulk');  
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
			$this->load->view('admin/header.php');
			$this->load->view('admin/add_interns_by_bulk', $error);
		}
		else {
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('admin/header.php');
			$this->load->view('admin/view_interns');
			
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

	// Fetches New Grad List
	function getNewGradList(){
		$this->load->model('intern_model');
		$this->intern_model->viewNewGrads();
	}

	// View Employers
	function viewEmployers() {
		$this->load->view('admin/header.php');
		$this->load->view('admin/view_employers');  	
	}

	// View Employers
	function viewNoSECEmployers() {
		$this->load->view('admin/header.php');
		$this->load->view('admin/view_no_sec_employers');  	
	}

	// Fetch Employers with No SEC Registration
	function getNoSECEmployerList() {
		$this->load->model('employer_model');
		$this->employer_model->viewNoSECEmployers();
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
        $data['myEmployerAffiliatedInterns'] = $this->employer_model->viewAffiliatedInterns();
        $data['myEmployerAffiliatedEmployees'] = $this->employer_model->viewAffiliatedEmployees();

		$this->load->helper('form');
		$this->load->view('admin/header.php');
		$this->load->view('admin/view_employer', $data);
	}

	// Update Employer
	function updateEmployer() {

		$this->load->model('employer_model');
		$this->employer_model->updateEmployer();
        $data['myEmployer'] = $this->employer_model->viewEmployer();
        $data['myEmployerContacts'] = $this->employer_model->viewEmployerContacts();
        $data['myEmployerAffiliatedInterns'] = $this->employer_model->viewAffiliatedInterns();
        $data['myEmployerAffiliatedEmployees'] = $this->employer_model->viewAffiliatedEmployees();

		$this->load->helper('form');
		$this->load->view('admin/header.php');
		$this->load->view('admin/view_employer', $data);
	}

	/* Load Add Employer View
	function addEmployer() {
		$this->load->view('admin/header.php');
		$this->load->view('admin/add_employer'); 
	}*/

	// Load Add Job Opening View
	function addCareer() {
		$this->load->view('admin/header.php');
		$this->load->view('admin/add_career'); 
	}

	// View Careers
	function viewCareers() {
		//$this->load->model('career_model');
		//$this->load->helper('form');
		//$data['careers'] = $this->career_model->viewCareers();	

		$this->load->view('admin/header.php');
		$this->load->view('admin/view_careers');
		//$this->load->view('admin/view_careers', $data);
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
			$this->load->view('admin/header.php');
			$this->load->view('admin/view_employer', $data);
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
			$this->load->view('admin/header.php');
			$this->load->view('admin/view_employer', $data);
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
	        $data['myEmployerAffiliatedInterns'] = $this->employer_model->viewAffiliatedInterns();
	        $data['myEmployerAffiliatedEmployees'] = $this->employer_model->viewAffiliatedEmployees();

			$this->load->helper('form');
			$this->load->view('admin/header.php');
			$this->load->view('admin/view_employer', $data);
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
				, 'filePath' => "uploads/Company_Logos/".$data['uploadSuccessLogo']['upload_success']['file_name']
			);

			$dataQ = $this->db->query($sql, $parameters);

			// Load Page
			$this->load->model('employer_model');
	        $data['myEmployer'] = $this->employer_model->viewEmployer();
	        $data['myEmployerContacts'] = $this->employer_model->viewEmployerContacts();
	        $data['myEmployerAffiliatedInterns'] = $this->employer_model->viewAffiliatedInterns();
	        $data['myEmployerAffiliatedEmployees'] = $this->employer_model->viewAffiliatedEmployees();

			$this->load->helper('form');
			$this->load->view('admin/header.php');
			$this->load->view('admin/view_employer', $data);
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
	        $data['myEmployerAffiliatedInterns'] = $this->employer_model->viewAffiliatedInterns();
	        $data['myEmployerAffiliatedEmployees'] = $this->employer_model->viewAffiliatedEmployees();

			$this->load->helper('form');
			$this->load->view('admin/header.php');
			$this->load->view('admin/view_employer', $data);
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
				, 'filePath' => "uploads/Other_Documents/".$data['uploadSuccessOther']['upload_success']['file_name']
			);

			$dataQ = $this->db->query($sql, $parameters);

			// Load Page
			$this->load->model('employer_model');
	        $data['myEmployer'] = $this->employer_model->viewEmployer();
	        $data['myEmployerContacts'] = $this->employer_model->viewEmployerContacts();
	        $data['myEmployerAffiliatedInterns'] = $this->employer_model->viewAffiliatedInterns();
	        $data['myEmployerAffiliatedEmployees'] = $this->employer_model->viewAffiliatedEmployees();

			$this->load->helper('form');
			$this->load->view('admin/header.php');
			$this->load->view('admin/view_employer', $data);
		}
	}

	// View Alumni
	function viewAlumni() {
		$this->load->view('admin/header.php');
		$this->load->view('admin/view_alumni');  
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
    	$data['myEmployerContacts'] = $this->alumnus_model->viewAlumnusContacts();

		$this->load->helper('form');
		$this->load->view('admin/header.php');
		$this->load->view('admin/view_alumnus_profile', $data);
	}

	// Update Alumnus
	function updateAlumnus() {

		$this->load->model('alumnus_model');
		$this->alumnus_model->updateAlumnus();
        $data['myAlumnus'] = $this->alumnus_model->viewAlumnus();
        $data['myCompanyNames'] = $this->alumnus_model->getAllCompanyNames();
    	$data['myEmployerContacts'] = $this->alumnus_model->viewAlumnusContacts();

		$this->load->helper('form');
		$this->load->view('admin/header.php');
		$this->load->view('admin/view_alumnus_profile', $data);
	}

	/* Load Add Alumnus Page
	function loadAddAlumnusView() {
		$this->load->view('admin/header.php');
		$this->load->view('admin/add_alumnus');  
	}*/

	/* Add Alumnus
	function addAlumnus() {
		$this->load->model('alumnus_model');
		$this->alumnus_model->createStudent();
		$this->load->view('admin/header.php');
		$this->load->view('admin/add_alumnus'); 
	}*/

	// Load Add Alumni By Bulk Page
	function loadAddAlumniByBulk(){
		$this->load->view('admin/header.php');
		$this->load->view('admin/add_alumni_by_bulk');  
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
			$this->load->view('admin/header.php');
			$this->load->view('admin/add_alumni_by_bulk', $error);
		}
		else {
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('admin/header.php');
			$this->load->view('admin/view_interns');
			
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


	// Load Update Intern To Alumnus Page
	function updateInternToAlumnus(){
		$this->load->view('admin/header.php');
		$this->load->view('admin/update_intern_to_alumnus');  
	}

	// Update Interns To Alumni
	function updateInternsToAlumni(){
		$this->load->model('intern_model');
		$this->intern_model->updateInternsToAlumni();

		$this->load->view('admin/header.php');
		$this->load->view('admin/update_intern_to_alumnus');  
	}


	function uploadInternsResume() {

		$this->load->helper('url');
		$this->load->model('alumnus_model');
		$student = $this->alumnus_model->viewMyAlumnus();
		
		$config['file_name'] = $alumnus->lastName.'_'.$alumnus->firstName.'_Resume';
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

	// Load Add Intern Page
	function loadAddInternView() {
		$this->load->model('intern_model');
		$this->data['companyList'] = $this->intern_model->getAllCompanyNames();
		$this->load->helper('form');
		$this->load->view('admin/header');
		$this->load->view('admin/add_intern', $this->data);  
	}

	// Add Intern
	function addIntern() {
		$this->load->model('intern_model');
		$this->intern_model->createStudent();
		$this->load->view('admin/header.php');
		$this->load->view('admin/add_intern'); 
	}

	// Load Add Encoder View
	function loadAddEncoderView(){
		$this->load->view('admin/header.php');
		$this->load->view('admin/add_encoder');  		
	}

	// Add Encoder
	function addEncoder() {
		$this->load->model('encoder_model');
		$this->encoder_model->addEncoder();
		$this->load->view('admin/header.php');
		$this->load->view('admin/view_users'); 
	}

	// Load Add Employer View
	function loadAddEmployerView() {
		$this->load->view('admin/header.php');
		$this->load->view('admin/add_employer'); 
	}

	function viewAdministrators() {
		$this->load->view('admin/header.php');
		$this->load->view('admin/view_administrators');
	} 

	// Fetches Arranged Admin List
	function getAdministratorList() {
		$this->load->model('administrator_model');
		$this->administrator_model->viewAdministrators();
	} 

	// Add Employer
	function addEmployer() {
		$this->load->model('employer_model');
		$this->employer_model->createEmployer();
		redirect('Administrator_Controller/viewEmployers');
	}

	function loadAddRepresentative(){
		$this->load->view('admin/header.php');
		$this->load->model('alumnus_model');
		$this->data['companyList'] = $this->alumnus_model->getAllCompanyNames();
		$this->load->helper('form');
		$this->load->view('employer/add_representative', $this->data); 
	}

	function addRepresentative(){
		$this->load->model('employer_model');
		$this->employer_model->createRepresentative();
	}

	// Load Add Admin View
	function loadAddAdminView() {
		$this->load->view('admin/header.php');
		$this->load->view('admin/add_admin'); 
	}

	// Add Admin
	function addAdmin() {
		$this->load->model('administrator_model');
		$this->load->helper('form');
		$this->administrator_model->createAdmin();
		redirect('Administrator_Controller/viewAdministrators');
	}
	// DICE 03/26/2014
	function loadAddAlumnusView(){
		$this->load->model('alumnus_model');
		$this->data['companyList'] = $this->alumnus_model->getAllCompanyNames();
		$this->load->helper('form');
		$this->load->view('admin/header.php');
		$this->load->view('admin/add_alumnus', $this->data);  		
	}
	
	// Add Alumnus
	function addAlumnus() {
		$this->load->model('alumnus_model');
		$this->alumnus_model->createStudent();
		$this->load->view('admin/header.php');
		$this->load->view('admin/add_alumnus'); 
	}

	// Load Add Evaluation Page
	function loadAddEvaluationView() {
		$this->load->view('admin/header');
		$this->load->view('employer/add_evaluation');  
	}

	// Add Evaluation
	function addEvaluation(){
		$this->load->model('evaluation_model');
		$this->evaluation_model->addEvaluation();
		$this->load->view('admin/header.php');
		$this->load->view('admin/add_intern');
	}

	////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////

}
?>