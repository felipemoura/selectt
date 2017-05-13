<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Form extends MY_Controller {
 
 	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$this->load->view('templates/header_logged');
		$this->load->view('logged/form_page');
		$this->load->view('templates/footer');
	}

	public function checkInsert() {
		// $checked = $this->input->post('isexample');

		// if ( $checked == 1) {
		// 	$data['error'] = 'ta setado';
		// } else {
		// 	$data['error'] = 'nao ta setado';
		// }

		$temp = $this->input->post('businessType');

		$str = "";
		foreach ($temp as $variable) {
		 	$str = $str.$variable;
		}
		$data['error'] = $str;


		$this->load->view('templates/header_logged');
		$this->load->view('logged/form_page',$data);
		$this->load->view('templates/footer');
	}
}

?>
