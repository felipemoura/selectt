<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Information extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function about ()
	{
		$this->load->view('information/about_page');
	}

	public function project ()
	{
		$this->load->view('information/project_page');
	}

	public function people ()
	{
		$this->load->view('information/people_page');
	}

	public function publication ()
	{
		$this->load->view('information/publication_page');
	}

}

?>