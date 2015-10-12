<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct()
    {
	parent::__construct();
	$this->load->model('User_model');
	date_default_timezone_set('Asia/Kolkata');
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
		$email 	= $this -> input -> post('email');
		//$config['protocol'] = 'smtp';
		//$config['smtp_host'] = 'smtp.googlemail.com';
		
		//$config['smtp_port'] = 465;
		//
		//$config['charset'] = 'iso-8859-1';
		//$config['wordwrap'] = TRUE;
		
		$config['protocol'] = "smtp";
		
		$config['smtp_host'] = "ssl://smtp.cisinlabs.com";
		$config['smtp_port'] = "465";
		
		//$config['smtp_user'] = 'hareram.p@cisinlabs.com';
		//$config['smtp_pass'] = 'aPGs7djkt3';
		
		$config['smtp_user'] = "vikas.b@cisinlabs.com"; 
		$config['smtp_pass'] = "fP6ZS6HD";
		
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
		
		$this->load->library('email', $config);
		
		//$this->email->initialize($config);
		
		$this->email->from('hareram.p@cisinlabs.com', 'Hareram');
		$this->email->to('hareram@mailinator.com');  
		
		$this->email->subject('Reset your Password');
		
		
		$possibleChars = "abcdefghijklmnopqrstuvwxyz";
		
		$activation_code = '';
		for($i = 0; $i < 8; $i++)
		{
		    $rand = rand(0, strlen($possibleChars) - 1);
		    $activation_code .= substr($possibleChars, $rand, 1);
		    $activation_code .= time();
		}
		
		$message = "<p>This email has been sent as a request to reset our password</p>";
		$message .= "<p><a href='".site_url('/users/reset_password/'.$activation_code)."'>Click here </a>if you want to reset your password,
                        if not, then ignore</p>";
		
		$this->email->message($message);
		$this->email->set_newline("\r\n");
		
		if($this->email->send())
		{
		    $set_data	= array( 'activation_code' => $activation_code, 'time' => time() );
		    if($this->User_model->insert_activation_code($set_data, $email))
		    {
			$this->session->set_flashdata('success','activation code has been send, please check your email ');
			redirect(site_url('users'));
		    }
		}
		else
		{
		    $this->session->set_flashdata('error','unable to send email ');
		    redirect(site_url('users/verify_email'));
		    echo $this->email->print_debugger();
		}
		
	    }
	}
	
	$this->load->view('/layouts/header', $data);
	$this->load->view('Users/verify_email');
	$this->load->view('/layouts/footer');
    }
    
    public function check_email($email)
    {
	$find_data	= array('email' => $email);
	$result		= $this->User_model->find($find_data);
	
	if(empty($result))
	{
	    return false;
	}
	else
	{
	    return true;
	}
    }
    
    public function reset_password($activation_code = '')
    {
	if( $activation_code != '' )
	{
	    $find_data		= array('activation_code' => $activation_code);
	    $result 		= $this->User_model->find($find_data);
	    $email  		= $result->email;
	    $current_time  	=time();
	    $stored_time 	= $result->time;
	    $data['id']		= $result->id;
	    $check_time 	= $current_time - $stored_time;
	    
	    if( $check_time < (24*60*60*1000) )
	    {
		$data['title'] 		= 'Reset Password';
		$data['site_url']	= site_url('users/reset_password');
		$this->load->view('/layouts/header', $data);
		$this->load->view('Users/reset_password', $data);
		$this->load->view('/layouts/footer');
	    }
	    else
	    {
		$this->session->set_flashdata('error','expire activation code, please resend the activation code ');
		redirect(site_url('/users/verify_email'));
	    }
	}
	
	$this->load->library('encrypt');
	//$this->form_validation->set_rules('username', 'Username', 'trim|required|callback_check_username[username]');
	$this->form_validation->set_rules('password', 'Password', 'required');
	$this->form_validation->set_rules('cpassword', 'Cpassword', 'required|matches[cpassword]');
	
	if( count( $_POST ) > 0 )
	{
	    if ($this->form_validation->run())
	    {
		$password	= $this->input->post('password');
		$id		= $this->input->post('id');
		$set_data	= array('password' => $password);
		if($this->User_model->update_password($set_data, $id))
		{
		    $this->session->set_flashdata('success','password reset successfully');
		    redirect(site_url('users'));
		}
	    }
	    else
	    {
		$this->session->set_flashdata('error','please enter valid or password ');
		redirect(site_url('/users'));
	    }
	}
	
    }
    
    
    public function logout()
    {
    	$this->session->sess_destroy();
	redirect(site_url('/users'));
	
    }
    
}
