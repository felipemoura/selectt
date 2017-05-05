<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Form extends MY_Controller {
 
	public function index()
	{
		$this->load->view('templates/header_logged');
		$this->load->view('logged/form_page');
		$this->load->view('templates/footer');
	}
}

?>
