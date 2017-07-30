<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Admin extends MY_Controller {

	/* Construct */
	public function __construct()
 	{
   		parent::__construct();
   		// control, only admins
        if (!$this->session->userdata('is_admin')) {
            redirect(base_url('logged'));
        }

        $this->load->model('admin_model');
   		$this->load->model('insert_model');
        $this->load->model('Utilidades_model', 'utility');
        $this->load->model('Technique', 'technique');
        $this->load->model('User', 'user');
 	}
 
	public function index()
	{
        redirect(base_url('admin/dash'));
    }

    public function dash () 
    {
        $this->load->view('admin/admin_page_dash');
    }
    
    public function techniques () {
        $data = $this->technique->getAllTechniques();
        $this->load->view('admin/admin_page_techniques', $data);
    }

    public function weights () {
        $data = $this->utility->getFields();
        $this->load->view('admin/admin_page_weights', $data);
    }

    public function users () {
        $data = $this->user->getAllUsers();
        $this->load->view('admin/admin_page_users', $data);
    }

    public function content () {
        $data['home']        = $this->utility->getHomeText();
        $data['people']      = $this->utility->getPeopleText();
        $data['publication'] = $this->utility->getPublicationText();
        $data['logado']      = $this->utility->getLogadoText();
        
        $this->load->view('admin/admin_page_content', $data);
    }


    // TECHNIQUES admin functions
	public function deleteTechnique ($id) {
		$this->technique->deleteTechnique($id);
		redirect(base_url('admin/techniques'));
	}

	public function approveTechnique ($id) {
		$this->technique->approveTechnique($id);
		redirect(base_url('admin/techniques'));
	}

    public function editInfo ($id) {
        $data['record'] = $this->admin_model->getAllFieldInfo($id);

        if (is_null($data['record'])) {
            redirect ('admin/techniques');
        }

        $this->load->view('admin/edit_record_admin_page', $data);
    }

	public function updateRecord ($targetID) {
		// remove se escolher no info !!!
        // verificar form no redirect !!
        // problem validating form, next release will fix

        // useful variables
        $id     = $this->insert_model->buildId();
        $name   = $this->insert_model->buildName();
        $field  = $this->insert_model->buildFields();

        //set validation rules
        $this->form_validation->set_rules('inputApproachTechniqueName', 'Technique Name', 'trim|required|min_length[3]|max_length[700]',
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
            array (     'max_length'    => 'Your %s must have YYYY format.'
                )
        );

        $this->form_validation->set_rules('inputTechniqueLink', 'Link', 'trim|valid_url|max_length[1023]',
            array (     'valid_url'     => 'You must provide a valid %s.',
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
            // fails
            $this->editInfo($targetID);
        
        } else {
            // Prepare the query to insert database, based on post form
            // prepare sql
            $sql = array(
                    'Title'      =>  $this->input->post("inputTitle", TRUE),
                    'Year'       => ($this->input->post('checkinputYear', TRUE) == 1 ) ? '-1' : ''.$this->input->post("inputYear", TRUE),
                    'Approach'   =>  $this->input->post("inputApproachTechniqueName", TRUE)
            );

            foreach ($field as $key => $value) {
                $sql[$value] = ($this->input->post('checkinput'.$value, TRUE) == 1) ? 'No information' : ''.$this->input->post('input'.$value, TRUE);
            }

            // insert form data into database
            if ($this->admin_model->updateRegister($targetID, $sql)) {
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You successfully updated '.$sql['Title'].' !</div>');
                redirect('admin/techniques');        

            } else {
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error updating '.$sql['Title'].' . Please try again later!!!</div>');
                redirect('admin/techniques');
            }

            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Unkown behavior</div>');

            redirect('admin/techniques');
        }
	}


    // USERS functions
    //
    //
    public function deleteUser ($id) {
        $this->admin_model->deleteUserDatabase($id);
        redirect(base_url('admin/users'));
    }

    public function approveUserAdmin ($id) {
        $this->admin_model->setAdmin($id);
        redirect(base_url('admin/users'));
    }

    public function disapproveUserAdmin ($id) {
        $this->admin_model->unsetAdmin($id);
        redirect(base_url('admin/users'));
    }

    public function approveUser ($id) {
        $this->admin_model->approveUserWithoutMailVerification($id);
        redirect(base_url('admin/users'));
    }

    public function editUser ($id) {
        $data['user'] = $this->admin_model->getAllUserInfo($id);

        if (is_null($data['user'])) {
            redirect ('admin/users');
        }

        $this->load->view('admin/edit_user_admin_page', $data);
    }

    public function updateUser ($targetID)
    {
        //set validation rules
        $this->form_validation->set_rules('inputUsername', 'Username', 'trim|required|alpha_numeric_spaces|min_length[3]|max_length[45]',
            array (    'required'      => 'You must provide a %s.',
                        'alpha_numeric_spaces'    => 'You can only use letters and numbers on %s',
                        'min_length'    => 'Your %s must have at least 3 characteres.',
                        'max_length'    => 'Your %s can have up to 45 characteres.'
                )
        );

        // solve unique problem here
        $this->form_validation->set_rules('inputEmail', 'Email', 'trim|required|valid_email|min_length[4]|max_length[255]',
            array ( 'required'      => 'You must provide a %s.',
                    'valid_email'   => 'You must provide a valid %s.',
                    'min_length'    => 'Your %s must have at least 4 characteres.',
                    'max_length'    => 'Your %s can have up to 255 characteres.'
            )
        );

        $this->form_validation->set_rules('inputFullName', 'Full Name', 'trim|required|alpha_numeric_spaces|min_length[4]|max_length[255]',
             array (    'required'      => 'You must provide a %s.',
                        'alpha_numeric_spaces'    => 'You can only use letters and numbers on %s',
                        'min_length'    => 'Your %s must have at least 4 characteres.',
                        'max_length'    => 'Your %s can have up to 255 characteres.'
                )
        );

        $this->form_validation->set_rules('inputInstitution', 'Institution', 'trim|max_length[1023]',
                 array ( 'max_length'    => 'Your %s can have up to 1023 characteres.'
                )

        );

        //validate form input
        if ($this->form_validation->run() == FALSE) {
            // fails
            $this->editUser ($targetID);
        
        } else {
            // Prepare the query to insert database, based on post form
            $data = array(
                'FULLNAME'      => $this->input->post('inputFullName',TRUE),
                'EMAIL'         => $this->input->post('inputEmail',TRUE),
                'USERNAME'      => $this->input->post('inputUsername',TRUE),
                'INSTITUTION'   => (($this->input->post('inputInstitution',TRUE) == null) ? '' : $this->input->post('inputInstitution', TRUE))
            );
            
            // insert form data into database
            if ($this->admin_model->updateUser($targetID, $data)) {
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You successfully updated '.$data['USERNAME'].' !</div>');

                redirect ('admin/users');
                
            } else {
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error updating '.$data['USERNAME'].' . Please try again later!!!</div>');

                redirect ('admin/users');
            }
        }
    }


    // WEIGHT FUNCTIONS
    //
    //
    public function saveWeights ()
    {
        $weights = $this->input->post();
        $data = $this->utility->getFields();

        $count = 0;
        foreach ($weights as $key => $value) {
            if ($data['fields'][$count++]['weight'] != floatval($value) ) {
                $this->utility->updateFieldWeight($key, $value);
            }
        }

        // successfully updated weights
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Weights Updated successfully !</div>');

        redirect ('admin/weights');
    }

    // CONTENT FUNCTIONS
    //
    //
    public function updatePeople ()
    {
       $id = 1;
       $text = $this->input->post('contentPeople');
       $this->utility->updatePeopleText($text, $id);
       redirect(base_url('admin/content'));
    }

    public function updateHome ()
    {
       $id = 1;
       $text = $this->input->post('contentHome');
       $this->utility->updateHomeText($text, $id);
       redirect(base_url('admin/content'));
    }

    public function updatePublication ()
    {
       $id = 1;
       $text = $this->input->post('contentPublication');
       $this->utility->updatePublicationText($text, $id);
       redirect(base_url('admin/content'));
    }

    public function updateLogado ()
    {
       $id = 1;
       $text = $this->input->post('contentLogado');
       $this->utility->updateLogadoText($text, $id);
       redirect(base_url('admin/content'));
    }

}
?>