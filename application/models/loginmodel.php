<?php

class Loginmodel extends CI_Model {

	public function login_valid( $username, $password )
	{
		$q= $this->db->query(" SELECT * FROM users WHERE 
							 uname='$username' AND 
							 pswrd='$password' ; ");

		if ( $q->num_rows() ){
			return $q->row()->id;
		}
		else{
			return FALSE;
		} 
	}

}

?>
