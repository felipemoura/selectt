<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Utilidades_model', 'utility');
	}

	public function index()
	{
		$data['home'] = $this->utility->getHomeText();
		$this->load->view('home/home_page', $data);
	}	
}

?>