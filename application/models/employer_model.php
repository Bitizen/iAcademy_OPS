<?php
class Employer_Model extends CI_Model {
		
	function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

	function viewMyRepresentative() {

  		$sql = "CALL viewRepresentative(?)";

		$user = $this->ion_auth->user()->row();
		$parameter = $user->username;

		$data = $this->db->query($sql, $parameter);
		$this->db->reconnect();
		$result = $data->row();

		return $result;
	}

	function viewEmployer() {

  		$sql = "CALL viewEmployer(?)";
  		$employer = $this->input->get('eID', TRUE);

		$data = $this->db->query($sql, $employer);
		$this->db->reconnect();
		$result = $data->row();

		return $result;
	}

	function viewMyStudentEmployer() {

  		$sql = "CALL viewMyStudentEmployer(?)";

		$user = $this->ion_auth->user()->row();
		$parameter = $user->username;

		$data = $this->db->query($sql, $parameter);
		$this->db->reconnect();
		$result = $data->row();

		return $result;
	}

	function viewMyStudentContacts() {

		$user = $this->ion_auth->user()->row();
		$parameter = $user->username;

  		$sql1 = "CALL viewMyStudentEmployer(?)";
		$data1 = $this->db->query($sql1, $parameter);
		$this->db->reconnect();
		$result1 = $data1->row(0);

  		$sql = "CALL viewMyStudentContacts(?)";
		$data = $this->db->query($sql, $result1->companyName);
		$this->db->reconnect();
		$result = $data->row();

		return $result;
	}

	function viewAffiliatedStudents(){
		$sql = "CALL viewAffiliatedStudents(?)";
		$employer = $this->input->get('eID', TRUE);
		$data = $this->db->query($sql, $employer);
		$this->db->reconnect();
		$result = $data->result();
		return $data->result();
	}

	function viewMyAffiliatedStudents(){

		$user = $this->ion_auth->user()->row();
		$parameter = $user->username;

		$sql = "CALL viewMyAffiliatedStudents(?)";
		$data = $this->db->query($sql, $parameter);
		$this->db->reconnect();
		$result = $data->result();
		return $data->result();
	}

	function updateEmployer() {

		$sql = "CALL updateEmployer(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
  		$employer = $this->input->get('eID', TRUE);
	
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
			, 'eID' => $employer
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

  		$parameter = $this->input->get('eID', TRUE);

		$data = $this->db->query($sql, $parameter);
		$this->db->reconnect();
		$result = $data->row();

		return $result;
	}

	function getMyCompanyName() {

  		$sql = "CALL getMyCompanyName(?)";

		$user = $this->ion_auth->user()->row();
		$parameter = $user->username;

		$data = $this->db->query($sql, $parameter);
		$this->db->reconnect();
		$result = $data->row();

		return $result;
	}

	function getAllCompanyNames() {

  		$sql = "CALL getAllCompanyNames()";

		$data = $this->db->query($sql);
		$this->db->reconnect();
		$result = $data->result();

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
		$this -> datatables -> select('employerID
			, companyName
			, completeMailingAddress
			, industryType
			, industryPartner
			');	
		$this -> datatables -> from('iops.employers');
		$this -> datatables -> edit_column('companyName', '<a href="viewEmployer?eID=$1">$2</a>', 'employerID, companyName');
		//$this-> datatables-> add_column('edit', '<a href="viewEmployer?eID=$1">VIEW</a>', 'employerID');
		$this -> datatables -> unset_column('employerID');
		echo $this->datatables->generate();
	}
	
	public function viewNoSECEmployers() {
		
		$industries = unserialize (INDUSTRY_LIST);
		$this -> load -> library('Datatables');
		$this -> datatables -> select('employerID
			, companyName
			, completeMailingAddress
			, industryType
			, industryPartner
			');	
		$this -> datatables -> from('iops.employers');
		$this -> datatables -> where('employers.SECRegistrationFilePath =', '');
		$this -> datatables -> edit_column('companyName', '<a href="viewEmployer?eID=$1">$2</a>', 'employerID, companyName');
		//$this-> datatables-> add_column('edit', '<a href="viewEmployer?eID=$1">VIEW</a>', 'employerID');
		$this -> datatables -> unset_column('employerID');
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

	// Add company to employers table
	function createEmployer(){
		$checkIfExists = "CALL checkIfEmpRecExists(?)";
		$query = $this->db->query($checkIfExists, array('employerID' => $_POST['employerID']));
		$this->db->reconnect();

		if ( sizeof($query->row_array()) == 0) {
			
			$industry = ($this->input->post('iIndustryType') == "NEW")? $this->input->post('iNewIndustryType') : $this->input->post('iIndustryType');
			$sql = "CALL addEmployer(?,?,?,?,?,?)";
			$parameters = array(
				'iCompanyName' => $this->input->post('iCompanyName')
				, 'industry' => $industry
				, 'iCompleteMailingAddress' => $this->input->post('iCompleteMailingAddress')
				, 'iTelephoneNumber' => $this->input->post('iTelephoneNumber')
				, 'iFaxNumber' => $this->input->post('iFaxNumber')
				, 'iWebsite' => $this->input->post('iWebsite')
			);

			$this->db->query($sql, $parameters);
			$this->db->reconnect();
		}
		else {
			echo "<script>
			window.location.href='<?= echo base_url(); ?>index.php/administrator_controller/loadAddInternView';
			alert('Employer/Company record already exists!');
			</script>";
        }	
	}


	// Add representative to users table and to users_groups
	function createRepresentative(){
		$checkIfExists = "CALL checkIfIdentityExists(?,?)";
		$query = $this->db->query($checkIfExists, 
			array(
				'username' => $this->input->post('username')
				,'email'   => $this->input->post('email')) 
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
			
			$repUserID = $this->ion_auth->register($username, $password, $email, $additional_data, array('2')); // employer group id is 2	
			$this->db->reconnect();

			if($repUserID != FALSE){

				// link the representative to a company
				$representativeType = $this->input->post('representativeType'); //primary, secondary or teritary contact  

				if($representativeType == 1){
					$sql = "CALL setRepAsPrimaryContact(?,?)";
				}else if($representativeType == 2){
					$sql = "CALL setRepAsSecondaryContact(?,?)";
				}else if($representativeType == 3){
					$sql = "CALL setRepAsTertiaryContact(?,?)";
				}

				$this->db->query($sql, array('employerID' => $this->input->post('employerID'),  'repUserID' => $repUserID) );
				$this->db->reconnect();


				$query = "CALL linkMyEmployerContacts(?,?)";
				$this->db->query($query, array('repUserID' => $repUserID, 'employerID' => $this->input->post('employerID'),  ) );



			}//end if register successful

		}		
		else {
			echo "<script>
			window.location.href='<?= echo base_url(); ?>index.php/administrator_controller/loadAddInternView';
			alert('Representative record already exists!');
			</script>";
        }	
	}

}
?>