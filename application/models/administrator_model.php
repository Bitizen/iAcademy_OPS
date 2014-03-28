<?php 
class Administrator_Model extends CI_Model {
	
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
	
	// Outputs User List
	function viewUsers() {
		$this -> load -> library('Datatables');
		$this-> datatables -> select('first_name, last_name, email, mobile');	
		$this-> datatables -> from('iops.users');	
		$this-> datatables-> add_column('edit', '<a href="viewIntern?sID=$1">VIEW</a>', 'studentID');
		$this-> datatables -> unset_column('studentID');	
		echo $this->datatables->generate();
	}

	// Outputs User List
	function viewAdministrators() {
		$this -> load -> library('Datatables');
		$this-> datatables -> select('firstName, middleName, lastName, position');	
		$this-> datatables -> from('administrators');	
		$this-> datatables-> add_column('edit', '<a href="viewAdministrator?aID=$1">VIEW</a>', 'administratorID');
		$this-> datatables -> unset_column('administratorID');	
		echo $this->datatables->generate();
	}

	function viewAdministrator() {

  		$sql = "CALL viewAdministrator(?)";
  		$administrator = $this->input->get('aID', TRUE);

		$data = $this->db->query($sql, $administrator);
		$this->db->reconnect();
		$result = $data->row();

		return $result;
	}

	////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////



	// Fetches User List
	function getUserList(){
		$users = $this->ion_auth->users()->result();
		return $users;
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
	
	function createAdmin(){
		$checkIfExists = "CALL checkIfAdminRecExists(?)";
		$query = $this->db->query($checkIfExists, array('administratorID' => $_POST['administratorID']));
		$this->db->reconnect();

		if ( sizeof($query->row_array()) == 0) {
			
			// Add to administrators table
			$sql = "CALL addAdministrator(?,?,?,?)";
			$parameters = array(
				'first_name' => $this->input->post('first_name')
				, 'last_name' => $this->input->post('last_name')
				, 'middle_name' => $this->input->post('middle_name')
				, 'position' => $this->input->post('position')
			);
			
			$this->db->query($sql, $parameters);
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
			
			// administrator group id is 1			
			$this->ion_auth->register($username, $password, $email, $additional_data, array('1'));
		}
		else {
			echo "<script>
			window.location.href='<?= echo base_url(); ?>index.php/administrator_controller/loadAddInternView';
			alert('Admin record already exists!');
			</script>";
        }
        	
	}
	
}
?>