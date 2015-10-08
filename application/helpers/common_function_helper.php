<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    
    function h_pagination($base_link, $total_rows, $per_page)
    {
	$CI =& get_instance();
	$CI->load->library('pagination');
	
	$config['base_url'] 		= $base_link;
	$config['total_rows'] 		= $total_rows;
	$config['per_page'] 		= $per_page;
	
	$config['full_tag_open'] 	= '<ul class="pagination">';
	$config['full_tag_close'] 	= '</ul>';
	$config['first_tag_open'] 	= '<li>';
	$config['first_link'] 		= 'First';
	$config['first_tag_close'] 	= '</li>';
	
	$config['last_tag_open'] 	= '<li>';
	$config['last_link'] 		= 'Last';
	$config['last_tag_close'] 	= '</li>';
	
	$config['prev_tag_open'] 	= '<li>';
	$config['prev_link'] 		= '&lt;';
	$config['prev_tag_close'] 	= '</li>';
	
	$config['next_tag_open'] 	= '<li>';
	$config['next_link'] 		= '&gt;';
	$config['next_tag_close'] 	= '</li>';
	
	$config['cur_tag_open'] 	= '<li class="active"><a>';
	$config['cur_tag_close']	= '</a></li>';
	
	$config['num_tag_open'] 	= '<li>';
	$config['num_tag_close']	= '</li>';
	
	
	$CI->pagination->initialize($config);
    }

    function is_user_login()
    {
	$CI = & get_instance();
	
	$record = $CI->session->userdata('username');
	
	if(empty($record) )
	{
	    redirect(site_url('/users'));
	}
    }
    
//    function file_upload($width, $height)
//    {
//	$CI =& get_instance();
//	$CI->load->library('upload');
//	
//	$config['upload_path'] = UPLOAD_PATH;
//	$config['allowed_types'] = 'gif|jpg|png|jpeg';
//	$config['max_size'] = '100';
//	$config['max_width'] = '1024';
//	$config['max_height'] = '768';
//	$config['image_width']  = $width;
//	$config['image_height'] = $height;
//	
//	$CI->upload->initialize($config);
//	if ( ! $CI->upload->do_upload())
//	{
//	    return true;
//	}
//	else
//	{
//	    return false;
//	}
//    }
//    
?>