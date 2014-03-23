<?php
class User_Model extends CI_Model {
		
	// View current user
	function viewUser() {
		$user = $this->ion_auth->user()->row();
		$username = $user->username;
		$sql = "CALL viewUser(?)";

		$data = $this->db->query($sql, $username);
		$this->db->reconnect();
		$row = $data->row();

		return $row;
	}

	// Update current user
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


	// View all users
	function viewAllUsers(){
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