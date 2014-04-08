
<?php
class Alumnus_Model extends CI_Model {
		
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

	function viewAlumni() {
		$this -> load -> library('Datatables');
		$this -> datatables -> select(
			'students.studentID
			, students.lastName
			, students.firstName
			, students.middleName
			, courses.course
			, skills.description
			, employment_status.status
			, employers.companyName
			, positions.position
			, employers_students_log.affiliation_status');
		$this -> datatables -> from('iops.students');
		$this -> datatables -> join('employers', 'employers.employerID = students.currentEmployerID', 'left');
		$this -> datatables -> join('courses', 'courses.courseID = students.courseID', 'left');
		$this -> datatables -> join('employment_status', 'employment_status.employment_statusID = students.statusID', 'left');

		$this -> datatables -> join('students_skills', 'students_skills.studentID = students.studentID', 'left');
		$this -> datatables -> join('skills', 'skills.skillID = students_skills.skillID', 'left');

		$this -> datatables -> join('employers_students_log', 'employers_students_log.studentID = students.studentID', 'left');
		$this -> datatables -> join('positions', 'positions.positionID = employers_students_log.positionID', 'left');

		//$this -> datatables -> where('iops.students.isGraduate = ', '1');
		$this -> datatables -> edit_column('students.lastName', '<a href="viewAlumnus?sID=$1">$2</a>', 'students.studentID, students.lastName');
		//$this -> datatables -> add_column('edit', '<a href="viewAlumnus?sID=$1">VIEW</a>', 'students.studentID');
		$this -> datatables -> unset_column('students.studentID');
		echo $this -> datatables -> generate();
	}
		

	function viewVerifiedAlumni() {
		$this -> load -> library('Datatables');
		$this -> datatables -> select(
			'students.studentID
			, students.firstName
			, students.middleName
			, students.lastName
			, courses.course
			, skills.description
			, employment_status.status
			, employers.companyName
			, positions.position
			, employers_students_log.affiliation_status');
		$this -> datatables -> from('iops.students');
		$this -> datatables -> join('employers', 'employers.employerID = students.currentEmployerID', 'left');
		$this -> datatables -> join('courses', 'courses.courseID = students.courseID', 'left');
		$this -> datatables -> join('employment_status', 'employment_status.employment_statusID = students.statusID', 'left');

		$this -> datatables -> join('students_skills', 'students_skills.studentID = students.studentID', 'left');
		$this -> datatables-> join('skills', 'skills.skillID = students_skills.skillID', 'left');

		$this -> datatables -> join('employers_students_log', 'employers_students_log.studentID = students.studentID', 'left');
		$this -> datatables -> join('positions', 'positions.positionID = employers_students_log.positionID', 'left');

		$this -> datatables -> where('iops.students.isGraduate = ', '1');
		$this -> datatables -> where('iops.students.isVerified = ', '1');
		$this -> datatables -> add_column('edit', '<a href="viewAlumnus?sID=$1">VIEW</a>', 'students.studentID');
		$this -> datatables -> unset_column('students.studentID');
		echo $this -> datatables -> generate();
	}

	function viewMyAlumnus() {

  		$sql = "CALL viewMyStudent(?)";
		$user = $this->ion_auth->user()->row();
		$username = $user->username;

		$data = $this->db->query($sql, $username);
		$this->db->reconnect();
		$result = $data->row();

		return $result;
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

	function viewAlumnus() {

  		$sql = "CALL viewAlumnus(?)";
  		$alumnus = $this->input->get('sID', TRUE);

		$data = $this->db->query($sql, $alumnus);
		$this->db->reconnect();
		$result = $data->row();

		return $result;
	}

	function viewAlumnusContacts() {

  		$alumnus = $this->input->get('sID', TRUE);

  		$sql1 = "CALL viewAlumnus(?)";
		$data1 = $this->db->query($sql1, $alumnus);
		$this->db->reconnect();
		$result1 = $data1->row(0);

  		$sql = "CALL viewEmployerContacts(?)";
		$data = $this->db->query($sql, $result1->currentEmployerID);
		$this->db->reconnect();
		$result['first'] = $data->row(0);
		$result['second'] = $data->row(1);
		$result['third'] = $data->row(2);

		return $result;
	}

	function getAllCompanyNames() {

  		$sql = "CALL getAllCompanyNames()";

		$data = $this->db->query($sql);
		$this->db->reconnect();
		$result = $data->result();

		return $result;
	}

	function updateAlumnus() {
		
		$sql = "CALL updateAlumnus(?,?,?,?,?,?,?,?,?,?,?,?,?)";

  		$alumnus = $this->input->get('sID', TRUE);

		$parameters = array(
			'studentID' => $alumnus
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
			, 'availability' => $this->input->post('iAvailability')
		);

		$data = $this->db->query($sql, $parameters);
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

	function createStudent() {

		$checkIfExists = "CALL checkIfStudRecExists(?)";
		$query = $this->db->query($checkIfExists, array('studentID' => $_POST['studentID']));
		$this->db->reconnect();
		
		// Add to students table
		if ( sizeof($query->row_array()) == 0) {
			$createStudProc = "CALL addStudent (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$result = $this->db->query( $createStudProc,
				 array('studentID' => $_POST['studentID']
					, 'firstName' => $_POST['first_name']
					, 'lastName' => $_POST['last_name']
					, 'middleName' => $_POST['middle_name']
					, 'landline' => $_POST['landline']
					, 'mobile' => $_POST['mobile']
					, 'emailAddress' => $_POST['email']
					, 'address' => $_POST['address']
					, 'contactDetailsLastUpdated' => date('Y-m-d H:i:s', now())
					, 'yearGraduated' => $_POST['yearGraduated']
					, 'monthGraduated' => $_POST['monthGraduated']
					, 'termGraduated' => $_POST['termGraduated']
					, 'courseID' => $_POST['courseID']
					, 'statusID' => $_POST['statusID'] ));
			$this->db->reconnect();

			// Add to users table
			$username = strtolower($_POST['username']);
			$email    = strtolower($_POST['email']);
			$password = $_POST['password'];

			$additional_data = array(
					 'first_name' => $_POST['first_name']
					, 'last_name' => $_POST['last_name']
					, 'middle_name' => $_POST['middle_name']
					, 'landline' => $_POST['landline']
					, 'mobile' => $_POST['mobile']
			);
			
			// alumnus groupID is 4			
			$this->ion_auth->register($username, $password, $email, $additional_data, array('4'));	
		}
		else {
			echo "<script>
			window.location.href='<?= echo base_url(); ?>index.php/administrator_controller/loadAddInternView';
			alert('Student record already exists!');
			</script>";
        }
	}



	//////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////

}
?>
