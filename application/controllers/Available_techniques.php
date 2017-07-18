<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Available_techniques extends CI_Controller {

	function __construct()
 	{
   		parent::__construct();
   		$this->load->model('Available_techniques_model');
 	}

	public function index()
	{
		$data = $this->Available_techniques_model->loadRegisters();
		$this->load->view('available_page', $data);
	}
}
?>