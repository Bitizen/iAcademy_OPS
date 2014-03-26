
<?php
class Intern_Model extends CI_Model {
		
	 function __construct() {
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

		$sql = "CALL updateContactDetails(?,?,?,?)";

		$parameters = array(
			'username'=> $username
			, 'telephone' => $this->input->post('iLandline')
			, 'mobile' => $this->input->post('iMobile')
			, 'email' => $this->input->post('iEmail')
		);

		$data = $this->db->query($sql, $parameters);
	}
	
	function viewInterns() {
		$this->load->library('Datatables');
		$this->datatables->select('studentID
			, firstName
			, lastName
			, middleName
			, landline
			, mobile
			, emailAddress
			, courseID
			, statusID
			, currentEmployerID');
		$this->datatables->from('iops.students');
		//$this-> datatables->join('iops.employers', 'employers.employerID = students.curretEmployerID', 'left');
		$this->datatables->where('iops.students.isGraduate = ', '0');
		$this->datatables->add_column('edit', '<a href="viewIntern?sID=$1">VIEW</a>', 'studentID');
		$this->datatables->unset_column('studentID');
		echo $this->datatables->generate();
	}

	function viewNewGrads() {
		$this->load->library('Datatables');
		$this->datatables->select('studentID
			, firstName
			, middleName
			, lastName
			, courseID
			, statusID
			, currentEmployerID');
		$this->datatables->from('iops.students');
		//$this-> datatables->join('iops.employers', 'employers.employerID = students.curretEmployerID', 'left');
		$this->datatables->where('iops.students.isGraduate = ', '0');
		//$this->datatables->where('iops.students.yearGraduated = ', date("Y"));
		//$this->datatables->unset_column('studentID');
		echo $this->datatables->generate();
	}

	function viewVerifiedInterns() {
		$this->load->library('Datatables');
		$this->datatables->select('studentID
			, firstName
			, lastName
			, middleName
			, landline
			, mobile
			, emailAddress
			, courseID
			, statusID
			, currentEmployerID');
		$this->datatables->from('iops.students');
		//$this-> datatables->join('iops.employers', 'employers.employerID = students.curretEmployerID', 'left');
		$this->datatables->where('iops.students.isGraduate = ', '0');
		$this->datatables->where('iops.students.isVerified = ', '1');
		$this->datatables->add_column('edit', '<a href="viewIntern?sID=$1">VIEW</a>', 'studentID');
		$this->datatables->unset_column('studentID');
		echo $this->datatables->generate();
	}

	function viewIntern() {

  		$sql = "CALL viewIntern(?)";
  		$intern = $this->input->get('sID', TRUE);

		$data = $this->db->query($sql, $intern);
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

	function updateIntern() {
		
		$sql = "CALL updateIntern(?,?,?,?,?,?,?,?,?,?,?,?)";

  		$intern = $this->input->get('sID', TRUE);

		$parameters = array(
			'studentID' => $intern
			, 'firstName' => $this->input->post('iFirstName')
			, 'middleName' => $this->input->post('iMiddleName')
			, 'lastName' => $this->input->post('iLastName')
			, 'landline' => $this->input->post('iLandline')
			, 'mobile' => $this->input->post('iMobile')
			, 'email' => $this->input->post('iEmail')
			, 'address' => $this->input->post('iAddress')
			, 'currentEmployerID' => $this->input->post('iCurrentCompanyID')
			, 'courseID' => $this->input->post('iCourseID')
			, 'statusID' => $this->input->post('iStatusID')
			, 'isVerified' => $this->input->post('iIsVerified')
		);

		$data = $this->db->query($sql, $parameters);
	}

	function updateInternsToAlumni() {

		$selected = $this->input->post('selected');
		$year = $this->input->post('year');
		$month = $this->input->post('month');
		$term = $this->input->post('term');
		//$decodedSelected = json_decode($selected);

  		$sql = "CALL updateInternToAlumnus(?,?,?,?)";
    	foreach($selected as $student) {
			//$this->db->update('iops.student', 1, array('studentID' => $student));
			$parameters = array(
				'studentID' => $student
				, 'year' => $year
				, 'month' => $month
				, 'term' => $term);
			$data = $this->db->query($sql, $parameters);
		}
	}

    function viewAnIntern($int){
  		$sql = "CALL viewStudentRecord(?)";
        //$parameters = array('userId'=> $int);
        $param = $int;
        echo $param;
		$data = $this->db->query($sql, $param);
		$this->db->reconnect();
		$result = $data->row();
		if($result == null){
			echo "fail";
		}
		return $result;
	}

	function createStudent() {

		$checkIfExists = "CALL checkIfStudRecExists(?)";
		$query = $this->db->query($checkIfExists, array('studentID' => $_POST['studentID']));
		$this->db->reconnect();
		
		if ( sizeof($query->row_array()) == 0) {
			$createStudProc = "CALL addStudent (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$result = $this->db->query( $createStudProc,
				 array('studentID' => $_POST['studentID']
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

			$createStudProc = "CALL addStudentAsUser (?,?,?,?,?,?)";
			$result = $this->db->query( $createStudProc,
				 array(
					 'first_name' => $_POST['firstName']
					, 'last_name' => $_POST['lastName']
					, 'middle_name' => $_POST['middleName']
					, 'landline' => $_POST['landline']
					, 'mobile' => $_POST['mobile']
					, 'email' => $_POST['emailAddress']));	
		}
		else {
			echo "<script>
			window.location.href='<?= echo base_url(); ?>index.php/administrator_controller/loadAddInternView';
			alert('Student record already exists!');
			</script>";
        }
	}


	function viewStudents() {
		$data = $this->db->query("CALL getStudentsData()");
		$this->db->reconnect();
		$result = $data->result();
		return $data->result();
	}

	function viewStudent() {
  		$sql = "CALL viewStudentRecord(?)";
        $parameters = array('studentID'=>$_GET['studentID']);
        $param = $_GET['studentID'];
		$data = $this->db->query($sql, $param);
		$result = $data->row();
		return $result;
	}

}
?>
