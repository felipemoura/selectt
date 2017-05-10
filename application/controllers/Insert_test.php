<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Insert_test extends MY_Controller {
 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

	public function index()
	{
		$this->load->view('templates/header_logged');
		$this->load->view('logged/insert_page', array('error' => ' ' ));
		$this->load->view('templates/footer');
	}

	public function do_upload()
    {
            $config['upload_path']          = './uploads/pdf';
            $config['allowed_types']        = 'pdf';
        	$config['max_size']    			= '2048';

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('inputArticlePDF'))
            {
                    $error = array('error' => $this->upload->display_errors());

                    $this->load->view('templates/header_logged');
                    $this->load->view('logged/insert_page', $error);
                    $this->load->view('templates/footer');
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());

                    $this->load->view('templates/header_logged');
                    $this->load->view('logged/insert_page', array('error' => 'Success update' ));
					$this->load->view('templates/footer');
            }
    }

}


?>
