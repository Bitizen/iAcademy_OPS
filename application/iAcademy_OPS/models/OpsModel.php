
<?php
class OpsModel extends CI_Model {

		
	 function __construct() {
        parent::__construct();
    }

	function viewStudent() {
  		$sql = "CALL viewCompleteStudentRecord(?)";
        $parameters = array('studentId'=>$_GET['student_id']);
        $param = $_GET['student_id'];
		$data = $this->db->query($sql, $param);
		$this->db->reconnect();
		$result = $data->row();
		return $result;
	}

	function viewStudents() {
		$data = $this->db->query("CALL viewAllStudentEH()");
		$this->db->reconnect();
		$result = $data->result();
		return $data->result();
	}

	function createStudent() {
		$data = array(
				  'STUDENT_ID' => $_POST['STUDENT_ID']
				, 'FIRSTNAME' => $_POST['FIRSTNAME']
				, 'LASTNAME' => $_POST['LASTNAME']
				, 'GENDER' => $_POST['GENDER']
				, 'BIRTHDATE' => $_POST['BIRTHDATE']
				, 'ADDRESS' => $_POST['ADDRESS']
				, 'CONTACT_DETAILS' => $_POST['CONTACT_DETAILS']
				, 'CONTACT_DETAILS_LAST_UPDATED' => $_POST['CONTACT_DETAILS_LAST_UPDATED']
				, 'COURSE_ID' => $_POST['COURSE_ID']
				, 'YEAR_GRADUATED' => $_POST['YEAR_GRADUATED']
				, 'EMPLOYMENT_STATUS_ID' => $_POST['EMPLOYMENT_STATUS_ID']
		);

		$cols = $_POST['col'];
		
		foreach($cols as $col) {
		   	$data2 = array(
		   		   'STUDENT_ID' => $_POST['STUDENT_ID']
		   		 , 'COMPANY_NAME' => mysql_real_escape_string($col['COMPANY_NAME'])
		   		 , 'ROLE_ID' => mysql_real_escape_string($col['ROLE_ID'])
		   		 , 'START_DATE' => mysql_real_escape_string($col['START_DATE'])
		   		 , 'END_DATE' => mysql_real_escape_string($col['END_DATE'])
		   	);

		    if($col['COMPANY_NAME'] != null && $col['ROLE_ID'] != null && $col['START_DATE'] != null ){
		    	$this->db->insert('student_employment_history',$data2);
			}
		}

		$this->db->insert('student_user_information',$data);
	}

	/*
	function createStudent() {
		$data = array(
			'STUDENT_ID' => $_POST['STUDENT_ID']
			, 'FIRSTNAME' => $_POST['FIRSTNAME']
			, 'LASTNAME' => $_POST['LASTNAME']
			, 'GENDER' => $_POST['GENDER']
			, 'BIRTHDATE' => $_POST['BIRTHDATE']
			, 'ADDRESS' => $_POST['ADDRESS']
			, 'CONTACT_DETAILS' => $_POST['CONTACT_DETAILS']
			, 'COURSE_ID' => $_POST['COURSE_ID']
			, 'YEAR_GRADUATED' => $_POST['YEAR_GRADUATED']
		);

		$this->db->insert('student_user_information',$data);
	}
	*/
	
	function updateStudent() {
		$data = array(
			'STUDENT_ID' => $_POST['student_id']
			, 'FIRSTNAME' => $_POST['firstname']
			, 'LASTNAME' => $_POST['lastname']
			//, 'GENDER' => $_POST['gender']
			//, 'BIRTHDATE' => $_POST['birthdate']
			, 'ADDRESS' => $_POST['address']
			, 'CONTACT_DETAILS' => $_POST['contact_details']
			//, 'COURSE_ID' => $_POST['course_id']
			//, 'YEAR_GRADUATED' => $_POST['year_graduated']		
		);

		$this->db->where('STUDENT_ID', $_POST['student_id']);
		$this->db->update('student_user_information', $data); 
	}
}
?>