<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Admin extends MY_Controller {

	/* Construct */
	function __construct()
 	{
   		parent::__construct();
   		$this->load->model('admin_model');
 	}

 
	public function index()
	{
		$data = $this->admin_model->loadRegisters();
		
		$this->load->view('templates/header_logged');
		$this->load->view('logged/admin_page', $data);
		$this->load->view('templates/footer');
	}

	public function deleteRecord ($id) {
		$this->admin_model->deleteRegister($id);
		redirect(base_url('admin'));
	}

	public function approveRecord ($id) {
		$this->admin_model->approveRegister($id);
		redirect(base_url('admin'));
	}
}

?>
