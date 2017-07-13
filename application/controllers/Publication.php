<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Publication extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
        $this->load->model('Utilidades_model', 'utility');
    }

	public function index()
	{
		$data['publication'] = $this->utility->getPublicationText();

		$this->load->view('templates/header');
		$this->load->view('home/publication_page', $data);
		$this->load->view('templates/footer');
	}
	
}

?>