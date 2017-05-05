<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publication extends CI_Controller {


	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('publication_page');
		$this->load->view('templates/footer');
	}
}

?>