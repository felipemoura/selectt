<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Admin extends MY_Controller {

	/* Construct */
	function __construct()
 	{
   		parent::__construct();
   		$this->load->model('admin_model');
   		$this->load->model('insert_model');
 	}
 
	public function index()
	{
		$this->loadAll (null);
	}

	public function loadAll ($param) {
		$data = $this->admin_model->loadRegisters();
		
		if ($param == null) {
			// do nothing
		} else {
			$data['modal'] = $param;
			$data['id']   = $this->insert_model->buildId();
        	$data['name'] = $this->insert_model->buildName();
        	$data['result'] = $this->insert_model->getAllFieldInfo($param);
		}

		$this->load->view('templates/header_logged');
		$this->load->view('logged/admin_page', $data);
		$this->load->view('templates/footer_admin_page', $data);
	}

	public function deleteRecord ($id) {
		$this->admin_model->deleteRegister($id);
		redirect(base_url('admin'));
	}

	public function approveRecord ($id) {
		$this->admin_model->approveRegister($id);
		redirect(base_url('admin'));
	}

	public function showInfo ($id) {
		$this->loadAll($id);
	}

	public function showEditInfo ($id) {
		$this->loadAll($id); 
	}

	public function updateRecord ($targetID) {
		// replace no pdf antigo, fazer isso
		// remove se escolher no info !!!

		
		// config for upload
        $config['upload_path']          = './uploads/pdf';
        $config['allowed_types']        = 'pdf';
    	$config['max_size']    			= '2048';
        $config['file_ext_tolower']     = TRUE;
        $temp = $this->admin_model->checkIfFileExists ($targetID);

        if ( $temp != null) {
	        $config['encrypt_name']         = FALSE;
        	$config['file_name'] = $temp;
        	$config['overwrite'] = TRUE;
        }

        $this->load->library('upload', $config);

        // useful variables
        $id     = $this->insert_model->buildId();
        $name   = $this->insert_model->buildName();
        $field  = $this->insert_model->buildFields();

        //set validation rules
        $this->form_validation->set_rules('inputApproach', 'Technique Name', 'trim|required|alpha_dash|min_length[3]|max_length[700]');
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
                    'Approach'   => $this->input->post("inputApproach"));

        foreach ($field as $key => $value) {
            $sql[$value] = ($this->input->post('checkinput'.$value) == 1) ? 'No information' : ''.$this->input->post('input'.$value);
        }

        // no file uploaded
        if ($this->input->post('checkinputArticlePDF') == 1 ) {
            $sql['PDF_File'] = 'No information';
            $this->admin_model->updateRegister($targetID, $sql);
            redirect('admin');
        }

        // test if uploaded file
        // error
        if ( ! $this->upload->do_upload('inputArticlePDF')) {
            // $error = array('error' => $this->upload->display_errors());
            // $this->loadAll ($this->upload->display_errors());
            $this->admin_model->updateRegister($targetID, $sql);
            redirect('admin');

        // sucess upload
        } else {
            // append filename to query
            $sql['PDF_File'] = $this->upload->data("file_name");
            $this->admin_model->updateRegister($targetID, $sql);
            // $this->insert_model->insertRecordTechnique($sql);
            // $this->loadAll ('Success update' );
            redirect('admin');
        }

        redirect('admin');
	}

}

?>
