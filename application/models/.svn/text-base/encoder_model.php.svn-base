<?php
class Encoder_Model extends CI_Model {
		
	function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

	// View My Account Details
	function viewMyAccount() {
		$user = $this->ion_auth->user()->row();
		$username = $user->username;
		$sql = "CALL viewMyAccount(?)";

		$data = $this->db->query($sql, $username);
		$this->db->reconnect();
		$row = $data->row();

		return $row;
	}

	// Update My Personal Details
	function updateUser() {
		
		$user = $this->ion_auth->user()->row();
		$username = $user->username;

		$sql = "CALL updateUser(?,?,?,?,?,?,?,?,?)";

		$parameters = array(
			'username' => $username
			, 'firstName' => $this->input->post('iFirstName')
			, 'middleName' => $this->input->post('iMiddleName')
			, 'lastName' => $this->input->post('iLastName')
			, 'Encoder'
			, 'telephone' => $this->input->post('iLandline')
			, 'mobile' => $this->input->post('iMobile')
			, 'email' => $this->input->post('iEmail')
			, 'dateOfBirth' => $this->input->post('iDateOfBirth')
		);

		$data = $this->db->query($sql, $parameters);
	}

	function viewMyEmployer() {

  		$sql = "CALL viewMyEmployer(?)";

		$user = $this->ion_auth->user()->row();
		$parameter = $user->username;

		$data = $this->db->query($sql, $parameter);
		$this->db->reconnect();
		$result = $data->row();

		return $result;
	}


	function viewEmployerContacts() {

  		$sql = "CALL viewEmployerContacts(?)";
  		$employer = $this->input->get('eID', TRUE);

		$data = $this->db->query($sql, $employer);
		$this->db->reconnect();

		$result['first'] = $data->row(0);
		$result['second'] = $data->row(1);
		$result['third'] = $data->row(2);

		return $result;
	}

	function viewMyEmployerContacts() {

  		$sql = "CALL viewMyEmployerContacts(?)";

		$user = $this->ion_auth->user()->row();
		$parameter = $user->username;

		$data = $this->db->query($sql, $parameter);
		$this->db->reconnect();
		
		$result['first'] = $data->row(0);
		$result['second'] = $data->row(1);
		$result['third'] = $data->row(2);

		return $result;
	}

	function getCompanyName() {

  		$sql = "CALL getCompanyName(?)";

		$user = $this->ion_auth->user()->row();
		$parameter = $user->username;

		$data = $this->db->query($sql, $parameter);
		$this->db->reconnect();
		$result = $data->row();

		return $result;
	}

	function updateRepresentative() {
		
		$sql = "CALL updateRepresentative(?,?,?,?,?,?,?,?,?)";

  		$representative = $this->input->get('uID', TRUE);

		$parameters = array(
			'uID' => $representative
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

	function updateMyRepresentative() {
		
		$sql = "CALL updateMyRepresentative(?,?,?,?,?,?,?,?,?)";

		$user = $this->ion_auth->user()->row();
		$representative = $user->username;

		$parameters = array(
			'username' => $representative
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

	function isNullOrEmptyString($question){
	    return (!isset($question) || trim($question)==='');
	}
	
	function updateMyEmployer() {

		$sql = "CALL updateMyEmployer(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	
		$user = $this->ion_auth->user()->row();
		$representative = $user->username;
		$industry = ($this->input->post('iIndustryType') == "NEW")? $this->input->post('iNewIndustryType') : $this->input->post('iIndustryType');

		$parameters = array(
			'companyName' => $this->input->post('iCompanyName')
			, 'industryType' => $industry
			, 'isHiring' => $this->input->post('iHiring')
			, 'completeMailingAddress' => $this->input->post('iCompleteMailingAddress')
			, 'telephoneNumber' => $this->input->post('iTelephoneNumber')
			, 'faxNumber' => $this->input->post('iFaxNumber')
			, 'website' => $this->input->post('iWebsite')
			, 'dateEstablished' => $this->input->post('iDateEstablished')
			, 'hasScholarshipGrants' => $this->input->post('iHasScholarshipGrants')
			, 'hasSeminarsAndTrainings' => $this->input->post('iHasSeminarsAndTrainings')
			, 'hasRecruitmentActivities' => $this->input->post('iHasRecruitmentActivities')
			, 'hasAllowanceProvision' => $this->input->post('iAllowance')	
			, 'hasFacultyImmersion' => $this->input->post('iHasFacultyImmersion')
			, 'username' => $representative
		);

		$data = $this->db->query($sql, $parameters);
	}

	function createEmployer() {

		$checkIfExists = "CALL checkIfEmpRecExists(?)";
		$query = $this->db->query($checkIfExists, array('employerID' => $_POST['employerID']));
		$this->db->reconnect();
		
		if ( sizeof($query->row_array()) == 0) {
			$createStudProc = "CALL addEmployer (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$result = $this->db->query( $createStudProc,
				 array('employerID' => $_POST['employerID']
					, 'firstName' => $_POST['firstName']
					, 'lastName' => $_POST['lastName']
					, 'middleName' => $_POST['middleName']
					, 'landline' => $_POST['landline']
					, 'mobile' => $_POST['mobile']
					, 'emailAddress' => $_POST['emailAddress']
					, 'address' => $_POST['address']
					, 'contactDetailsLastUpdated' => date('Y-m-d H:i:s', now())
					, 'yearGraduated' => $_POST['yearGraduated']
					, 'monthGraduated' => $_POST['monthGraduated']
					, 'termGraduated' => $_POST['termGraduated']
					, 'courseID' => $_POST['courseID']
					, 'statusID' => $_POST['statusID'] ));

			$this->db->reconnect();
			/*
			$createStudProc = "CALL addStudentAsUser (?,?,?,?,?,?)";
			$result = $this->db->query( $createStudProc,
				 array(
					 'first_name' => $_POST['firstName']
					, 'last_name' => $_POST['lastName']
					, 'middle_name' => $_POST['middleName']
					, 'landline' => $_POST['landline']
					, 'mobile' => $_POST['mobile']
					, 'email' => $_POST['emailAddress']));	
			*/
		}
		else {
			echo "<script>
			window.location.href='<?= echo base_url(); ?>index.php/administrator_controller/addEmployer';
			alert('Student record already exists!');
			</script>";
        }
	}

	function getIndustryType($industryId) {
        //return ($active == 1)? 'image link 1' : 'image link 2';
        $industries = unserialize (INDUSTRY_LIST);
        /*switch ($industryId) {
          case 25:
              $industryId = $industries[$industryId];
              break;
        }*/
        $industryId = $industries[$industryId];
      
        //echo $industryId;
        //return  $industries[$industryId];
    }

    function fix_first_name($val) {
	  return ucwords(strtoupper($val));
	}

	public function viewEmployers() {
		
		$industries = unserialize (INDUSTRY_LIST);
		$this -> load -> library('Datatables');
		$this-> datatables -> select('employerID, companyName, industryType, completeMailingAddress, telephoneNumber, 
				   faxNumber, website');	
		$this-> datatables -> from('iops.employers');
		$this-> datatables-> add_column('edit', '<a href="viewEmployer?eID=$1">VIEW</a>', 'employerID');
		$this-> datatables -> unset_column('employerID');
		echo $this->datatables->generate();
	}


	public function generateReportForEmployers() {
		$this->load->dbutil();			
		$query = $this->db->query("CALL getEmployersData()");
		$this->db->reconnect();
		$delimiter = ",";
		$newline = "\r\n";

		$data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
		if ( ! write_file('application/views/uploads/Employers.csv', $data))
		{
		     echo '<script>alert("Unable to write the file!");</script>';
			redirect('home/getListOfEmployers', 'refresh');
		}
		else
		{
			echo '<script>alert("Report generation successful!");</script>';
			redirect('home/getListOfEmployers', 'refresh');
		}
	}

	
	function addEncoder(){
		$checkIfExists = "CALL checkIfIdentityExists(?,?)";
		$query = $this->db->query($checkIfExists, 
		array(
			'username' => $this->input->post('username')
			,'email'   => $this->input->post('email') )
		);
		$this->db->reconnect();

		if ( sizeof($query->row_array()) == 0) {

			// Add to users table
			$username = strtolower($this->input->post('username'));
			$email    = strtolower($this->input->post('email'));
			$password = $this->input->post('password');

			$additional_data = array(
					 'first_name' => $this->input->post('first_name')
					, 'last_name' => $this->input->post('last_name')
					, 'middle_name' => $this->input->post('middle_name')
					, 'landline' => $this->input->post('landline')
					, 'mobile' => $this->input->post('mobile')
			);
			
			// encoder group id is 3			
			$this->ion_auth->register($username, $password, $email, $additional_data, array('3'));
		}
		else {
			echo "<script>
			window.location.href='<?= echo base_url(); ?>index.php/administrator_controller/loadAddInternView';
			alert('Encoder record already exists!');
			</script>";
        }	
	}


}
?>