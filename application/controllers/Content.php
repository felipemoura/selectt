<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Available_techniques_model');
		$this->load->model('Utilidades_model', 'utility');
	}

	public function techniques ()
	{
		$data = $this->Available_techniques_model->loadRegisters();
		$this->load->view('content/available_page', $data);
	}

	public function tools ()
	{
		$this->load->view('content/tools_page');
	}

	public function statistics ()
	{
		$data['technique'] = $this->utility->getInsertByMonth();
		$data['resultTechnique'] = $this->utility->getUserSubmission();
		$this->load->view('content/statistics_page', $data);
	}

	public function screenshots ()
	{
		$this->load->view('content/screenshots_page');
	}

}

?>