<?php
class EmployerModel extends CI_Model {
		
	function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

	function viewEmployer() {
  		$sql = "CALL viewEmployer(?)";
        $parameter = $_POST['employerID'];
		$data = $this->db->query($sql, $parameter);
		$this->db->reconnect();
		$result = $data->row();

		return $result;
	}

	function viewEmployerOfRepresentative() {

  		$sql = "CALL viewEmployerOfRepresentative(?)";

		$user = $this->ion_auth->user()->row();
		$parameter = $user->username;

		$data = $this->db->query($sql, $parameter);
		$this->db->reconnect();
		$result = $data->row();

		return $result;
	}

	function updateEmployer() {
		$data = array(
			'employerID' => $_POST['employerID']
			, 'companyName' => $_POST['companyName']
			, 'industryID' => $_POST['industryID']
			, 'isHiring' => $_POST['isHiring']
			, 'SECRegistrationFilePath' => $_POST['SECRegistrationFilePath']
			, 'completeMailingAddress' => $_POST['completeMailingAddress']
			, 'telephoneNumber' => $_POST['telephoneNumber']
			, 'faxNumber' => $_POST['faxNumber']
			, 'website' => $_POST['website']
			, 'dateEstablished' => $_POST['dateEstablished']
			, 'companyLogoFilePath' => $_POST['companyLogoFilePath']
			, 'otherDocumentsFilePath' => $_POST['otherDocumentsFilePath']
			, 'hasScholarshipGrants' => $_POST['hasScholarshipGrants']
			, 'hasSeminarsAndTrainings' => $_POST['hasSeminarsAndTrainings']
			, 'hasRecruitmentActivities' => $_POST['hasRecruitmentActivities']
			, 'hasAllowanceProvision' => $_POST['hasAllowanceProvision']	
			, 'hasFacultyImmersion' => $_POST['hasFacultyImmersion']
			, 'primaryContactName' => $_POST['primaryContactName']
			, 'primaryContactDesignation' => $_POST['primaryContactDesignation']
			, 'primaryContactTelephoneNumber' => $_POST['primaryContactTelephoneNumber']
			, 'primaryContactMobileNumber' => $_POST['primaryContactMobileNumber']
			, 'primaryContactEmail' => $_POST['primaryContactEmail']
			, 'primaryContactDateOfBirth' => $_POST['primaryContactDateOfBirth']
			, 'secondaryContactName' => $_POST['secondaryContactName']
			, 'secondaryContactDesignation' => $_POST['secondaryContactDesignation']
			, 'secondaryContactTelephoneNumber' => $_POST['secondaryContactTelephoneNumber']
			, 'secondaryContactMobileNumber' => $_POST['secondaryContactMobileNumber']
			, 'secondaryContactEmail' => $_POST['secondaryContactEmail']
			, 'secondaryContactDateOfBirth' => $_POST['secondaryContactDateOfBirth']
		);

		$this->db->where('employerID', $_POST['employerID']);
		$this->db->update('employers', $data); 
	}

}
?>