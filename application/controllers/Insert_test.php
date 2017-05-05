<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Insert_test extends MY_Controller {
 
	public function index()
	{
		$this->load->view('templates/header_logged');
		$this->load->view('logged/insert_page');
		$this->load->view('templates/footer');
	}
}

?>
