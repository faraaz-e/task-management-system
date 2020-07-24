<?php

class Loginmodel extends CI_Model {

	public function login_valid( $username, $password )
	{
		// $this->load->database();
		// Database is loaded in Autoload instead of writing the above line here.
		$q= $this->db->query(" SELECT * FROM users WHERE 
							 uname='$username' AND 
							 pswrd='$password' ; ");

		if ( $q->num_rows() ){
			return $q->row()->id;
				// return TRUE;
		}
		else{
				return FALSE;
		} 
	}

}

?>