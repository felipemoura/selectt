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

		$this->load->view('templates/header');
		$this->load->view('available_page', $data);
		$this->load->view('templates/footer');
	}

	public function showInfo ($id) {
		if (!is_numeric($id)) {
			redirect ('Available_techniques');
		}

		$data = $this->Available_techniques_model->loadRegisters();

		$data['modal'] 	= $id;
    	$data['result'] = $this->Available_techniques_model->getAllFieldInfo($id);


		$this->load->view('templates/header');
		$this->load->view('available_page', $data);
		$this->load->view('templates/footer');
	}
}
?>