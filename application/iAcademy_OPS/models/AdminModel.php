<?php
class AdminModel extends CI_Model {

		
	 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

	function getAdminData()
	{
		$data = $this->db->query("CALL viewAdmins()");
		$this->db->reconnect();
		$result = $data->result();
		return $data->result();
	}

	//still to convert to an SP
	function createData()
	{
		$data = array(
			  'FIRSTNAME' => $_POST['FIRSTNAME']
			, 'LASTNAME' => $_POST['LASTNAME']
		);

		$this->db->insert('admin_user_information',$data);
	}
}
?>