<?php

class Product_model extends CI_Model {
    
    public function find_all($column = 'p.id', $order = 'DESC', $offset = '', $per_page = '')
    {
	
	
	$this->db->select('p.id, p.title, p.product_image, p.description, p.price, p.created_on, p.updated_on, p.is_enabled,
			pc.id as product_category_id');
	
	$this->db->from('products as p');
	$this->db->join('product_categories as pc', 'pc.id = p.product_category_id');
	
	if(!empty( $per_page )){
	    $this->db->limit($per_page, $offset);    
	}
	$this->db->order_by($column, $order);
	$query = $this->db->get();
	
	if($query->num_rows() > 0)
	{
	    if(empty( $per_page ) && empty($offset))
	    {
		return $query->num_rows();
	    }
	    else
	    {
	    $results = $query->result();
	    return $results;
	    }
	}
	else
	{
	    return false;
	}
    }
    
   //=============================================
    
    public function find($id)
    {
	$this->db->select('id, title, description, price');
	$this->db->from('products');
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
	$this->db->update('products', $data);
	return true;
    }
    
    //=============================================  
    
    public function add($data)
    {
	$this->db->insert('products', $data);
	
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
	$this->db->delete('products');
	
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
	$this->db->update('products', $data);
	return true;
    }
    
    //=============================================  
}

?>