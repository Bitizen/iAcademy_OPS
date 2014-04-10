<?php

class Upload extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index() {
		$this->load->view('employer/view_company_profile', array('error' => ' ' ));
	}

	function index2()
	{
		$this->load->view('intern/upload_form', array('error' => ' ' ));
	}

	function uploadSECRegistration() {

		$this->load->model('EmployerModel');
		$companyName = $this->EmployerModel->getCompanyName();
		
		$config['file_name'] = $companyName->companyName.'_SEC_Registration';
		$config['upload_path'] = './uploads/SEC_Registration/';
		$config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx';
		$config['max_size']	= '2048';
		$config['max_width']  = '5000';
		$config['max_height']  = '5000';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload()) {
			$data['uploadErrorSEC'] = array('error' => $this->upload->display_errors());
			
			$this->load->model('EmployerModel');
	        $data['myEmployer'] = $this->EmployerModel->viewEmployer();
        	$data['myEmployerContacts'] = $this->EmployerModel->viewEmployerContacts();

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
				, 'filePath' => "uploads\SEC_Registration\\".$data['uploadSuccessSEC']['upload_success']['file_name']
			);

			$dataQ = $this->db->query($sql, $parameters);

			// Load Page
			$this->load->model('EmployerModel');
	        $data['myEmployer'] = $this->EmployerModel->viewEmployer();
        	$data['myEmployerContacts'] = $this->EmployerModel->viewEmployerContacts();

			$this->load->helper('form');
			$this->load->view('employer/view_company_profile', $data);
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
			
			$this->load->model('EmployerModel');
	        $data['myEmployer'] = $this->EmployerModel->viewEmployer();
        	$data['myEmployerContacts'] = $this->EmployerModel->viewEmployerContacts();

			$this->load->view('employer/view_company_profile', $data);
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
			$this->load->model('EmployerModel');
	        $data['myEmployer'] = $this->EmployerModel->viewEmployer();
        	$data['myEmployerContacts'] = $this->EmployerModel->viewEmployerContacts();

			$this->load->helper('form');
			$this->load->view('employer/view_company_profile', $data);
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
			
			$this->load->model('EmployerModel');
	        $data['myEmployer'] = $this->EmployerModel->viewEmployer();
        	$data['myEmployerContacts'] = $this->EmployerModel->viewEmployerContacts();

			$this->load->view('employer/view_company_profile', $data);
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
			$this->load->model('EmployerModel');
	        $data['myEmployer'] = $this->EmployerModel->viewEmployer();
        	$data['myEmployerContacts'] = $this->EmployerModel->viewEmployerContacts();

			$this->load->helper('form');
			$this->load->view('employer/view_company_profile', $data);
		}
	}

		function do_upload()
	{
		$config['upload_path'] = 'application/views/uploads/';
		$config['allowed_types'] = 'csv';
		$config['max_size']	= '100';
		$config['max_size'] = '5000';
    	$config['file_name'] = 'interns_upload_'.time();
    	$replace = '"';
      	$with = ' ';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('intern/upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('intern/upload_success', $data);
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
		//redirect('intern/viewAllInterns');
		}
	}

}
?>