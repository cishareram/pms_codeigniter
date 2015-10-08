<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct()
    {
	parent::__construct();
	$this->load->model('User_model');
    }
    
    public function index()
    {
	$data['title'] 		= 'Login';
	$data['site_url']	= site_url('users/index');
	$this->load->library('encrypt');
	
	if( $_POST > 0 )
	{
	    $username 	= $this -> input -> post('username');
	    $password	= $this -> input -> post('password');
	    
	    if(!empty($username) && !empty($password))
	    {
		$result		= $this->User_model->find( $username );
		$user_name	= $result->username;
		$pass		= $result->password;
		
		if( ($username === $user_name) && ($password === $pass) )
		{
		    $sessiondata = array(
			'username'	=> $username,
			'password'	=> $password,
		    );
		    $this->session->set_userdata($sessiondata);
		    $this->session->set_flashdata('success','login successful');
		    redirect(site_url('/product_categories'));
		}
		else
		{
		    $this->session->set_flashdata('error','invalid username or password ');
		    redirect(site_url('/users'));
		}
		
	    }
	    else{
	     
		$this->load->view('/layouts/header', $data);
		$this->load->view('Users/login');
		$this->load->view('/layouts/footer');
	    }
	}
    }
    public function logout()
    {
    	$this->session->sess_destroy();
	redirect(site_url('/users'));
	
    }
    
}
