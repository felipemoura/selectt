<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Logged extends MY_Controller {
 
	public function __construct()
    {
        parent::__construct();		
        $this->load->model('Utilidades_model', 'utility');
    }

	public function index()
	{
		$data['logado'] = $this->utility->getLogadoText();
		$this->load->view('logged/logged_page', $data);
	}
}

?>
