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
	
}
?>