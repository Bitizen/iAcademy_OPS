
<?php
class Alumnus_Model extends CI_Model {
		
	 function __construct() {
        parent::__construct();
    }

	function viewAlumni() {
		$this -> load -> library('Datatables');
		$this-> datatables -> select('studentID, firstName, lastName, middleName, landline, mobile, 
				   emailAddress, courseID, statusID, currentEmployerID');
		$this-> datatables -> from('iops.students');
		$this -> datatables -> where('iops.students.isGraduate = ', '1');
		$this-> datatables-> add_column('edit', '<a href="viewAlumnus?sID=$1">VIEW</a>', 'studentID');
		$this-> datatables -> unset_column('studentID');
		echo $this->datatables->generate();
	}

	function viewVerifiedAlumni() {
		$this -> load -> library('Datatables');
		$this-> datatables -> select('studentID, firstName, lastName, middleName, landline, mobile, 
				   emailAddress, courseID, statusID, currentEmployerID');
		$this-> datatables -> from('iops.students');
		$this -> datatables -> where('iops.students.isGraduate = ', '1');
		$this -> datatables -> where('iops.students.isVerified = ', '1');
		$this-> datatables-> add_column('edit', '<a href="viewAlumnus?sID=$1">VIEW</a>', 'studentID');
		$this-> datatables -> unset_column('studentID');
		echo $this->datatables->generate();
	}

	function viewAlumnus() {

  		$sql = "CALL viewAlumnus(?)";
  		$alumnus = $this->input->get('sID', TRUE);

		$data = $this->db->query($sql, $alumnus);
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

	function updateAlumnus() {
		
		$sql = "CALL updateAlumnus(?,?,?,?,?,?,?,?,?,?,?,?)";

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
