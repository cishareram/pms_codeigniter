<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function __construct()
        {
	    parent::__construct();
	    $this->load->model('User_model');
        }
	
	public function index()
	{
	    $data['title'] 		= 'Login';
	    $data['site_url']	= site_url('/users');
	    
	    if( $_POST > 0 )
	    {
		$username 	= $this -> input -> post('username');
		$password	= $this -> input -> post('password');
		
		if(!empty($username) && !empty($password))
		{
		    
		}
		else{
		 
		    $this->load->view('/layouts/header', $data);
		    $this->load->view('Users/login');
		    $this->load->view('/layouts/footer');
		}
	    }
	}
}
