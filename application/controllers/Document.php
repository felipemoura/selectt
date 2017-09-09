<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Document extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function quickstart ()
	{
		$this->load->view('document/quickstart_page');
	}

	public function usermanual ()
	{
		$this->load->view('document/usermanual_page');
	}

	public function documentation ()
	{
		$this->load->view('document/documentation_page');
	}
}

?>