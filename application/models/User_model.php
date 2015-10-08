<?php

class User_model extends CI_Model {

    public function find($username)
    {
	$this->db->select('username, password');
	$this->db->from('users');
	$this->db->where('username', $username);
	
	$query = $this->db->get();
	
	if($query->num_rows() > 0)
	{
	    $results = $query->row();
	    return $results;    
	}
	else
	{
	    return false;
	}
	
    }
    
}

?>