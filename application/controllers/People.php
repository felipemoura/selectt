<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class People extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
        $this->load->model('Utilidades_model', 'utility');
    }

	public function index()
	{
		$data['people'] = $this->utility->getPeopleText();
		$this->load->view('home/people_page', $data);
	}
	
}
?>