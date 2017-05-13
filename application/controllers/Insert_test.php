<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Insert_test extends MY_Controller {
 
    function __construct()
    {
        parent::__construct();
        $this->load->model('insert_model');
    }

	public function index()
	{
      $this->loadAll (null);  
	} 

    public function loadAll ($arg) {
        if ($arg != null) {
            $data['error'] = $arg;
        }   

        $data['id']   = $this->insert_model->buildId();
        $data['name'] = $this->insert_model->buildName();

        $this->load->view('templates/header_logged');
        $this->load->view('logged/insert_page', $data);
        $this->load->view('templates/footer');
    }

	public function do_upload()
    {
        // config for upload
        $config['upload_path']          = './uploads/pdf';
        $config['allowed_types']        = 'pdf';
    	$config['max_size']    			= '2048';
        $config['file_ext_tolower']     = TRUE;
        $config['encrypt_name']         = TRUE;

        $this->load->library('upload', $config);

        // useful variables
        $id     = $this->insert_model->buildId();
        $name   = $this->insert_model->buildName();
        $field  = $this->insert_model->buildFields();

        //set validation rules
        $this->form_validation->set_rules('inputApproachTechniqueName', 'Technique Name', 'trim|required|alpha_dash|min_length[3]|max_length[700]');        
        $this->form_validation->set_rules('inputTitle', 'Title', 'trim|required|alpha_dash|min_length[3]|max_length[1023]');
        $this->form_validation->set_rules('inputYear', 'Year', 'trim|alpha_dash|max_length[4]');

        // validate all other forms
        foreach ($id as $key => $value) {
            $this->form_validation->set_rules( $value, $name[$key], 'trim|alpha_dash|max_length[1023]');
        }

        // prepare sql
        $sql = array(
                    'Title'      => $this->input->post("inputTitle"),
                    'Year'       => ($this->input->post('checkinputYear') == 1 ) ? '-1' : ''.$this->input->post("inputYear"),
                    // 'PDF_File'   => $this->upload->data("file_name"),
                    'Approach'   => $this->input->post("inputApproachTechniqueName"));

        foreach ($field as $key => $value) {
            $sql[$value] = ($this->input->post('checkinput'.$value) == 1) ? 'No information' : ''.$this->input->post('input'.$value);
        }

        // no file uploaded
        if ($this->input->post('checkinputArticlePDF') == 1 ) {
            $sql['PDF_File'] = 'No information';
            $this->insert_model->insertRecordTechnique($sql);
            $this->loadAll ('Success update' );
        }

        // test if uploaded file
        // error
        if ( ! $this->upload->do_upload('inputArticlePDF')) {
            // $error = array('error' => $this->upload->display_errors());
            $this->loadAll ($this->upload->display_errors());

        // sucess upload
        } else {
            // append filename to query
            $sql['PDF_File'] = $this->upload->data("file_name");
            $this->insert_model->insertRecordTechnique($sql);
            $this->loadAll ('Success update' );
        }
    }

}
?>
