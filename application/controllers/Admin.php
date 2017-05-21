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
        $data = $this->admin_model->loadRegisters();

        $this->load->view('templates/header_logged');
        $this->load->view('logged/admin_page', $data);
        $this->load->view('templates/footer_admin_page');
	}

	public function deleteRecord ($id) {
		$this->admin_model->deleteRegister($id);
		redirect(base_url('admin'));
	}

	public function approveRecord ($id) {
		$this->admin_model->approveRegister($id);
		redirect(base_url('admin'));
	}

    public function editInfo ($id) {
        $record = $this->admin_model->getAllFieldInfo($id);

        if (is_null($record)) {
            redirect ('admin');
        }
        $data['record'] = $record;

        $this->load->view('templates/header_logged');
        $this->load->view('logged/edit_record_admin_page', $data);
        $this->load->view('templates/footer_admin_page', $data);
    }

	public function updateRecord ($targetID) {
		// remove se escolher no info !!!
        // verificar form no redirect !!

        // useful variables
        $id     = $this->insert_model->buildId();
        $name   = $this->insert_model->buildName();
        $field  = $this->insert_model->buildFields();


        //set validation rules
        $this->form_validation->set_rules('inputApproach', 'Technique Name', 'trim|required|alpha_dash|min_length[3]|max_length[700]');
        $this->form_validation->set_rules('inputTitle', 'Title', 'trim|required|alpha_dash|min_length[3]|max_length[1023]');
        $this->form_validation->set_rules('inputYear', 'Year', 'trim|alpha_dash|max_length[4]');

        $this->form_validation->set_rules('inputTechniqueLink', 'Link', 'trim|valid_url|max_length[1023]');

        // validate all other forms
        foreach ($id as $key => $value) {
            if ($value == 'inputTechniqueLink') continue;

            $this->form_validation->set_rules( $value, $name[$key], 'trim|alpha_dash|max_length[1023]');
        }
        
        // prepare sql
        $sql = array(
                    'Title'      => $this->input->post("inputTitle"),
                    'Year'       => ($this->input->post('checkinputYear') == 1 ) ? '-1' : ''.$this->input->post("inputYear"),
                    'Approach'   => $this->input->post("inputApproach"));

        foreach ($field as $key => $value) {
            $sql[$value] = ($this->input->post('checkinput'.$value) == 1) ? 'No information' : ''.$this->input->post('input'.$value);
        }

        $this->admin_model->updateRegister($targetID, $sql);
        redirect('admin');
	}
}
?>