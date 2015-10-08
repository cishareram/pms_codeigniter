<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_categories extends CI_Controller {
	
	public function __construct()
        {
	    parent::__construct();
	    $this->load->model('Product_category_model');
	    
	    is_user_login();
        }
	
	//=============================================
	
	public function index($offset=1, $column='', $order='')
	{
	    $data['title'] 	= 'Product Category List';
	    
	    if($order == "ASC")
	    {
		$order= "DESC";
	    }
	    else
	    {
		$order= "ASC";
	    }
	    
	    $data['order'] 		=  $order;
	    $data['page'] 		=  $offset;
	    $data['logout_url']		=  site_url('users/logout');
	    $data['site_url']		=  site_url('product_categories');
	    $data['products_url']	=  site_url('products/index');
	    $total_rows 		=  $this->Product_category_model->find_all();
	    
	    $site_url			=  site_url('/product_categories/index/');
	    $per_page			=  3;
	    $data['results'] 		=  $this->Product_category_model->find_all($column, $order, $offset, $per_page);
	    
	    h_pagination($site_url, $total_rows, $per_page);
	    $this->load->view('/layouts/header', $data);
	    $this->load->view('/layouts/nav');
	    $this->load->view('/Product_categories/index', $data);
	    $this->load->view('/layouts/footer');
	}
	
	//=============================================
	
	public function add()
	{
	    $data['title'] 	= 'Product Category Add';
	    $data['site_url']	= site_url('product_categories');
	    $data['products_url']	= site_url('products/index');
	    $data['logout_url']	= site_url('users/logout');
	    $site_url		= site_url('product_categories/index');
	    
	    if( count( $_POST ) > 0 )
	    {
		$title 		= $this -> input -> post('title');
		$description	= $this -> input -> post('description');
		
		if (!empty($title) && !empty($description))
		{
		    $insert_data	= array('title' => $title, 'description' => $description); 
		    if($this->Product_category_model->add( $insert_data))
		    {
			$this->session->set_flashdata('success','record added successfully');
			redirect($site_url);
		    }
		}
	    }
	    $this->load->view('/layouts/header', $data);
	    $this->load->view('/layouts/nav');
	    $this->load->view('/Product_categories/add', $data);
	    $this->load->view('/layouts/footer');
	}
	
	//=============================================
	
	public function edit($id)
	{
	    $data['title'] 	= 'Product Category Edit';
	    $data['site_url']	= site_url('product_categories');
	    $site_url		= site_url('product_categories/index');
	    $data['products_url']	= site_url('products/index');
	    $data['logout_url']	= site_url('users/logout');
	    if( count( $_POST ) > 0 )
	    {
		$title 		= $this -> input -> post('title');
		$description	= $this -> input -> post('description');
		
		if (!empty($title) && !empty($description))
		{
		    $set_data	= array('title' => $title, 'description' => $description); 
		    if($this->Product_category_model->update( $set_data, $id))
		    {
			$this->session->set_flashdata('success','record updated successfully');
			redirect($site_url);
		    }
		}
	    }
	    if($this->Product_category_model->find( $id ))
	    {
		$data['result'] = $this->Product_category_model->find( $id );
		$this->load->view('/layouts/header', $data);
		$this->load->view('/layouts/nav');
		$this->load->view('/Product_categories/edit', $data);
		$this->load->view('/layouts/footer');
	    }
	}
	
	//=============================================
	
	public function remove($id)
	{
	    $data['title'] = 'Product Category List';
	    
	    if($this->Product_category_model->delete($id))
	    {
		echo 1;
	    }
	    else
	    {
		echo 0;
	    }
	    die;
	}
	
	//=============================================
	
	public function set_is_enable()
	{
	    $data['title'] = 'Product Category List';
	    
	    $is_enabled 	= $this -> input -> post('is_enable');
	    $id 		= $this -> input -> post('id');
	    
	    $is_enable = ($is_enabled == 1) ? 0 : 1;
	    
	    $update_data = array('is_enabled' => $is_enable);
	    
	    if( $this->Product_category_model->is_enabled( $update_data, $id ) )
	    {
		echo 1;
	    }
	    else
	    {
		echo 0;
	    }
	    die;
	}
	
	
	//=============================================
    }
