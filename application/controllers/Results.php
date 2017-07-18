<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Results extends MY_Controller {
 
	public function index()
	{
		$this->load->view('form/results_page');
	}
}

?>
