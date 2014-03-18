<?php
class EmployerModel extends CI_Model {

		
	 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

	function getEmployerData()
	{
		$data = $this->db->query("CALL viewEmployers()");
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
			, 'COMPANY_NAME' => $_POST['COMPANY_NAME']
		);

		$this->db->insert('business_user_information',$data);
	}
}
?>