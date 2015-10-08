<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
	
	public function __construct()
        {
	    parent::__construct();
	    $this->load->model('Product_model');
	    $this->load->model('Product_category_model');
	    is_user_login();
        }
	
	//=============================================
	
	public function index($offset=0, $column='', $order='')
	{
	    $data['title'] 	= 'Products List';
	    
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
	    $data['products_url']	=  site_url('products');
	    $total_rows 		=  $this->Product_model->find_all() ;
	    $site_url			=  site_url('/products/index/');
	    $per_page			=  2;
	    if($this->Product_model->find_all($column, $order, $offset, $per_page))
	    {
		$data['results'] 		=  $this->Product_model->find_all($column, $order, $offset, $per_page);
		h_pagination($site_url, $total_rows, $per_page);
		$this->load->view('/layouts/header', $data);
		$this->load->view('/layouts/nav');
		$this->load->view('/Products/index', $data);
		$this->load->view('/layouts/footer');
	    }
	}
	
	//=============================================
	
	public function add()
	{
	    $data['title'] 		= 'Product Add';
	    $data['logout_url']		=  site_url('users/logout');
	    $data['site_url']		=  site_url('product_categories');
	    $data['products_url']	=  site_url('products');
	    $perpage			=  $this->Product_category_model->find_all();
	    $data['results'] 		=  $this->Product_category_model->find_all('title', 'ASC', 0, $perpage);
	    $site_url			= site_url('products/index');
	    
	    if( count( $_POST ) > 0 )
	    {
		$product_category_id 	= $this -> input -> post('product_category_id');
		$title 			= $this -> input -> post('title');
		$price 			= $this -> input -> post('price');
		$description		= $this -> input -> post('description');
		
		$file			= $_FILES['file'];
		
		//$file			= $_FILES['file']['name'];
		//$temp			= $_FILES['file']['temp'];
		
		$config['upload_path'] = UPLOAD_ROOT_PATH ;
		//$config['upload_url'] = $temp;
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '50000';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
		//$config['image_width']  = $width;
		//$config['image_height'] = $height;
		
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload( 'file' ))
		{
		    print_r($this->upload->display_errors());
		}
		else
		{
		    $data = array('upload_data' => $this->upload->data());
		    print_r($data);
		}
	    
		
		
		
		die;
		
		if ($upload && !empty($title) && !empty($price) && !empty($description) && !empty($product_category_id) )
		{
		    $insert_data	= array( 'product_category_id' => $product_category_id, 'title' => $title, 'product_image' => $file, 'description' => $description, 'price' => $price); 
		    if($this->Product_model->add( $insert_data))
		    {
			$this->session->set_flashdata('success','record added successfully');
			redirect($site_url);
		    }
		}
		
	    } 
	    
	    $this->load->view('/layouts/header', $data);
	    $this->load->view('/layouts/nav');
	    $this->load->view('/Products/add', $data);
	    $this->load->view('/layouts/footer');
	}
	
	//=============================================
	
	public function edit($id)
	{
	    $data['title'] 	= 'Product Edit';
	    $data['logout_url']		=  site_url('users/logout');
	    $data['site_url']		=  site_url('product_categories');
	    $data['products_url']	=  site_url('products');
	    $site_url			= site_url('products/index');
	    $perpage			=  $this->Product_category_model->find_all();
	    $data['records'] 		=  $this->Product_category_model->find_all('title', 'ASC', 0, $perpage);
	    
	    if( count( $_POST ) > 0 )
	    {
		$title 		= $this -> input -> post('title');
		$description	= $this -> input -> post('description');
		$price 		= $this -> input -> post('price');
		$product_category_id 	= $this -> input -> post('product_category_id');
		if (!empty($title) && !empty($description) && !empty($product_category_id) && !empty($price))
		{
		    $set_data	= array('product_category_id' => $product_category_id, 'title' => $title, 'description' => $description, 'price' => $price); 
		    if($this->Product_model->update( $set_data, $id))
		    {
			$this->session->set_flashdata('success','record updated successfully');
			redirect($site_url);
		    }
		}
	    }
	    if($this->Product_model->find( $id ))
	    {
		$data['result'] = $this->Product_model->find( $id );
		$this->load->view('/layouts/header', $data);
		$this->load->view('/layouts/nav');
		$this->load->view('/Products/edit', $data);
		$this->load->view('/layouts/footer');
	    }
	}
	
	//=============================================
	
	public function remove($id)
	{
	    $data['title'] = 'Product List';
	    
	    if($this->Product_model->delete($id))
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
	    $data['title'] = 'Product List';
	    
	    $is_enabled 	= $this -> input -> post('is_enable');
	    $id 		= $this -> input -> post('id');
	    
	    $is_enable = ($is_enabled == 1) ? 0 : 1;
	    
	    $update_data = array('is_enabled' => $is_enable);
	    
	    if( $this->Product_model->is_enabled( $update_data, $id ) )
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
