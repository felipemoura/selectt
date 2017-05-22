<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
 
 	public function __construct()
       {
            parent::__construct();
			
			if ( ($this->session->userdata("logged_in") != 1) || ($this->session->userdata("is_verifyed") != 1) ) {

				redirect(base_url('login'));				
			}
       }
}

?>