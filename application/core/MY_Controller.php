<?php defined('BASEPATH') OR exit('No direct script access allowed');


class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if ( $this->session->userdata("logged_in") != 1 ) 
        {
        	$this->session->set_flashdata('msg','<div class="alert alert-warning text-center">Your session expired, please login again !</div>');   
            redirect(base_url('login'));  
        } 

        if ( $this->session->userdata("is_verifyed") != 1 )  
        {
            $this->session->set_flashdata('msg','<div class="alert alert-warning text-center">Your account is not verified yet, please verify it. </div>');   
            redirect(base_url('login'));                
        } 

        // accepted if passed this line
	}
}

?>