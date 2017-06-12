<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class People extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('home/people_page');
		$this->load->view('templates/footer');
	}
}
?>