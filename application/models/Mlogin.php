<?php

/**
* 
*/
class Mlogin extends CI_Model
{
	
	public function __construct()
	{
		
	}

	public function check_user($username, $password)
	{
		$query = $this->db->query("select * from tusers where username = '".$username."' and password ='".md5($password)."'");
		return $query->num_rows();
	}

	public function check_level($username)
	{
		$query = $this->db->query("select level from tusers where username ='".$username."'");
		return $query->row_array();
	}
}