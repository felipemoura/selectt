<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Form extends MY_Controller {
 
 	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$this->load->view('form/form_page');
	}

	public function getResults ()
	{
		$matrix;

		for ($i=1; $i <= 15; $i++) { 
			$matrix[$i-1] = $this->input->post('input_'.$i);
		}
		
		// Teste code
		$message = "";
		foreach ($matrix as $key => $value) {
			$message = $message.$value."\n";
		}
		$this->session->set_flashdata('msg','<div class="alert alert-success text-center">'.$message.'</div>');
		
		// do some logic

		redirect('results');
	}
}

?>
