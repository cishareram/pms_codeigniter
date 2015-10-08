<?php

class Product_category_model extends CI_Model {
    
    public function find_all($column='id', $order='DESC', $offset='', $per_page='')
    {
	$this->db->select('*');
	$this->db->from('product_categories');
	$this->db->order_by($column, $order);
	if( !empty( $per_page )){
	    
	    $this->db->limit($per_page, $offset);    
	    
	    $query = $this->db->get();
	    if($query->num_rows() > 0)
	    {
		$results = $query->result();
		return $results;
	    }
	    else
	    {
		return false;
	    }
	}
	else
	{
	    $query = $this->db->get();
	    if($query->num_rows() > 0)
	    {
		
	        return $query->num_rows();
	    }
	    else
	    {
		return false;
	    }
	}
    }
    
   //=============================================
    
    public function find($id)
    {
	$this->db->select('id, title, description');
	$this->db->from('product_categories');
	$this->db->where('id', $id);
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
    
   //=============================================
    
    public function update($data, $id)
    {
	$this->db->where('id', $id);
	$this->db->update('product_categories', $data);
	return true;
    }
    
    //=============================================  
    
    public function add($data)
    {
	$this->db->insert('product_categories', $data);
	
	if ($this->db->affected_rows() > 0)
	{
	    return true;
	}
	else
	{
	    return false;
	}	
    }
    
    //=============================================
    
    public function delete($id)
    {
	$this->db->where('id', $id);
	$this->db->delete('product_categories');
	
	if ($this->db->affected_rows() > 0)
	{
	    return true;
	}
	else
	{
	    return false;
	}	
    }
    
    //=============================================
    
    public function is_enabled($data, $id)
    {
	$this->db->where('id', $id);
	$this->db->update('product_categories', $data);
	return true;
    }
    
    //=============================================  
}

?>