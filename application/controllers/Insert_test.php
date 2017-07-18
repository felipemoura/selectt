<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Insert_test extends MY_Controller {
 
    function __construct()
    {
        parent::__construct();
        $this->load->model('insert_model');
    }

	public function index()
	{
        $this->loadView();
	} 

    public function loadView ()
    {
        $data['id']   = $this->insert_model->buildId();
        $data['name'] = $this->insert_model->buildName();

        $this->load->view('logged/insert_page', $data);
    }

	public function insert_database()
    {
        // fazer verificacao de sql na db, se foi e erros
        // fazer a page customizavel, com n coluns diferentes

        // useful variables
        $id     = $this->insert_model->buildId();
        $name   = $this->insert_model->buildName();
        $field  = $this->insert_model->buildFields();

        //set validation rules
        $this->form_validation->set_rules('inputApproachTechniqueName','Technique Name','trim|required|min_length[3]|max_length[700]',
            array (     'required'      => 'You must provide a %s.',
                        'min_length'    => 'Your %s must have at least 3 characteres.',
                        'max_length'    => 'Your %s can have up to 700 characteres.'
                )
        );

        $this->form_validation->set_rules('inputTitle', 'Title', 'trim|required|min_length[3]|max_length[1023]',
            array (     'required'      => 'You must provide a %s.',
                        'min_length'    => 'Your %s must have at least 3 characteres.',
                        'max_length'    => 'Your %s can have up to 1023 characteres.'
                )
        );

        $this->form_validation->set_rules('inputYear', 'Year', 'trim|max_length[4]',
            array (     'max_length'    => 'Your %s can have up to 4 characteres.'
                )
        );

        $this->form_validation->set_rules('inputTechniqueLink', 'Link', 'trim|valid_url|max_length[1023]',
            array (     'valid_url'      => 'You must provide a valid %s.',
                        'max_length'    => 'Your %s can have up to 1023 characteres.'
                )
        );

        // validate all other forms
        foreach ($id as $key => $value) {
            if ($value == 'inputTechniqueLink') { continue; }

            $this->form_validation->set_rules( $value, $name[$key], 'trim|max_length[1023]',
                array (  'max_length'    => 'Your %s can have up to 1023 characteres.'
                )
            );
        }

         //validate form input
        if ($this->form_validation->run() == FALSE) {
            $this->loadView();

        } else {
             // prepare sql
            $sql = array(
                        'Title'      => $this->input->post("inputTitle", TRUE),
                        'Year'       => ($this->input->post('checkinputYear', TRUE) == 1 || 
                                         $this->input->post("inputYear", TRUE) == "") ? '-1' : ''.$this->input->post("inputYear", TRUE),
                        'Approach'   => $this->input->post("inputApproachTechniqueName", TRUE),
                        'InsertedOn' => date("Y-m-d H:i:s")
                    );

            foreach ($field as $key => $value) {
                $sql[$value] = ($this->input->post('checkinput'.$value, TRUE) == 1 ||
                                $this->input->post('input'.$value, TRUE) == "") ? 'No information' : ''.$this->input->post('input'.$value, TRUE);
            }

            if ($this->insert_model->insertRecordTechnique($sql) == TRUE) {
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You successfully added <strong>' . $sql['Approach'] . '</strong> technique to database, the administrator will answer it soon.</div>');

                redirect(base_url('insert_test')); 

            } else {
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Something went wrong with the database, please try again later.<br><strong>' . $str . '</strong></div>');

                redirect(base_url('insert_test')); 
            }

            $this->session->set_flashdata('msg','<div class="alert alert-warning text-center">Unknown behavior, contact the administrator !</div>');

            redirect(base_url('insert_test'));
        }
    }

}

?>