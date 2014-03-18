<?php

class User extends CI_Model{

	 function login($username, $password){
	   $this -> db -> select('USERNAME, PASSWORD');
	   $this -> db -> from('admin_user_information');
	   $this -> db -> where('username', $username);
	   $this -> db -> where('password', hash('sha512', $password.config_item('encryption_key')) );
	   $this -> db -> limit(1);

	   $query = $this -> db -> get();

	   if($query -> num_rows() == 1){
	     return $query->result();
	   } else{
	     return false;
	   }
 	}

}

?>