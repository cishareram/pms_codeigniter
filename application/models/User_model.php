<?php

class User_model extends CI_Model {

    public function find($set_data = '', $email = '')
    {
	$this->db->select('*');    
	$this->db->from('users');
	
	if(!empty($set_data))
	{
	    $this->db->where($set_data);    
	}
	else
	{
	    $this->db->where('email', $email);
	}
	
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