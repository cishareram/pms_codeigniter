<?php

class User_model extends CI_Model {

    public function find($set_data)
    {
	$this->db->select('*');    
	$this->db->from('users');
	
	$this->db->where($set_data);    
	
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
    public function insert_activation_code($activation_code, $email)
    {
	$set_data	= array( 'activation_code' => $activation_code );
	$this->db->where('email', $email);
	$this->db->update('users', $set_data);
	
	if ($this->db->affected_rows() > 0)
	{
	    return true;
	}
	else
	{
	    
	    return false;
	}	
    }
    
    public function update_password($set_data, $email)
    {
	$this->db->where('email', $email);
	$this->db->update('products', $set_data);
	return true;
    }
    
}

?>