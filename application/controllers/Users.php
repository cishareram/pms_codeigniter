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
	$this->form_validation->set_rules('username', 'Username', 'trim|required|callback_check_username[username]');
	$this->form_validation->set_rules('password', 'Password', 'required');
	
	if( count( $_POST ) > 0 )
	{
	    if ($this->form_validation->run())
	    {
		$this->session->set_flashdata('success','login successful');
		redirect(site_url('/product_categories'));
	    }
	    else
	    {
		$this->session->set_flashdata('error','invalid username or password ');
		redirect(site_url('/users'));
	    }
	}
	$this->load->view('/layouts/header', $data);
	$this->load->view('Users/login');
	$this->load->view('/layouts/footer');
    }
    
    
    public function check_username($username)
    {
	$password 	= $this -> input -> post('password');
	$set_data	= array('username' => $username, 'password' => $password);
	$result		= $this->User_model->find( $set_data );
	
	if(empty($result))
	{
	    return false;
	}
	else
	{
	    $sessiondata = array(
		'username'	=> $result->username,
		'password'	=> $result->password,
	    );
	    print_r($sessiondata);
	    $this->session->set_userdata($sessiondata);
	    return true;
	}
    }
    
    public function verify_email()
    {
	$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_check_email[email]');
	$data['title'] 		= 'Email';
	$data['site_url']	= site_url('users/verify_email');
	
	if( count( $_POST ) > 0 )
	{
	    if ($this->form_validation->run() == FALSE)
	    {
		$this->session->set_flashdata('error','invalid email id');
		redirect(site_url('users/verify_email'));
		
	    }
	    else
	    {
		
		$this->load->library('email');
		
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'smtp.cisinlabs.com';
		$config['smtp_user'] = 'hareram.p@cisinlabs.com';
		$config['smtp_pass'] = 'aPGs37djkt';
		$config['smtp_port'] = 25;
		
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		
		$this->email->initialize($config);
		
		$this->email->from('hareram.p@cisinlabs.com', 'Hareram');
		$this->email->to('hareram.p@cisinlabs.com');  
		
		$this->email->subject('Email Test');
		$this->email->message('Testing the email.');	
		
		$this->email->send();
		
		echo $this->email->print_debugger();
		
		
		//$this->session->set_flashdata('success','please check Email and change password');
		//redirect(site_url('users'));
	    }
	}
	
	$this->load->view('/layouts/header', $data);
	$this->load->view('Users/verify_email');
	$this->load->view('/layouts/footer');
    }
    
    public function check_email($email)
    {
	$result		= $this->User_model->find('',$email);
	
	if(empty($result))
	{
	    return false;
	}
	else
	{
	    return true;
	}
    }
    
    
    public function logout()
    {
    	$this->session->sess_destroy();
	redirect(site_url('/users'));
	
    }
    
}
