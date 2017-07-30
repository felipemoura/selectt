<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Form extends MY_Controller {
 
 	public function __construct()
    {
        parent::__construct();
        $this->load->model('Utilidades_model', 'utility');
        $this->load->model('Technique', 'technique');
    }

	public function index()
	{
		// $data['category'][0] = $this->utility->getFieldsCategory('Programming model');
		$data['category'][1] = $this->utility->getFieldsCategory('General testing characteristics');
		$data['category'][2] = $this->utility->getFieldsCategory('Concurrent testing characteristics');
		$data['category'][3] = $this->utility->getFieldsCategory('Testing tool support');

		$data['name'][0] = 'Study identification';
		$data['name'][1] = 'Programming model';
		$data['name'][2] = 'General testing characteristics';
		$data['name'][3] = 'Concurrent testing characteristics';
		$data['name'][4] = 'Testing tool support';

		$this->load->view('form/form_page', $data);
	}

	public function getResults ()
	{
		print_r($this->input->post());
		// $matrix;

		// for ($i=1; $i <= 15; $i++) { 
		// 	$matrix[$i-1] = $this->input->post('input_'.$i);
		// }
		
		// // Teste code
		// $message = "";
		// foreach ($matrix as $key => $value) {
		// 	$message = $message.$value."\n";
		// }
		// $this->session->set_flashdata('msg','<div class="alert alert-success text-center">'.$message.'</div>');
		
		// // do some logic

		// redirect('results');
	}
}

?>
