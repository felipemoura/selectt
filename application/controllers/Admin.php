<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Admin extends MY_Controller {

	/* Construct */
	public function __construct()
 	{
   		parent::__construct();

   		// control access, only admins
        if (!$this->session->userdata('is_admin')) {
            redirect(base_url('logged'));
        }

        $this->load->model('Utilidades_model', 'utility');
        $this->load->model('Technique_model', 'technique');
        $this->load->model('User_model', 'user');
 	}
 
	public function index()
	{
        redirect(base_url('admin/dash'));
    }

    public function dash () 
    {
        $data = $this->utility->getUsersRegisters();
        $data['technique'] = $this->utility->getInsertByMonth();
        $data['resultTechnique'] = $this->utility->getUserSubmission();
        $this->load->view('admin/admin_page_dash', $data);
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


    // *********************************************************************************************************
    // ******************************************       TECHNIQUE        ***************************************
    // *********************************************************************************************************
    // TECHNIQUES admin functions
	public function deleteTechnique ($id) {
		$this->technique->deleteTechnique($id);
		redirect(base_url('admin/techniques'));
	}

	public function approveTechnique ($id) {
		$this->technique->approveTechnique($id);
		redirect(base_url('admin/techniques'));
	}

    public function editTechnique ($id) {
        $data['technique'] = $this->technique->buildTechnique($id);

        if (is_null($data['technique'])) {
            redirect ('admin/techniques');
        }

        // $data['category'][0] = $this->utility->getFieldsCategory('Study identification');
        $data['category'][0] = $this->utility->getFieldsCategory('Programming model');
        $data['category'][1] = $this->utility->getFieldsCategory('General testing characteristics');
        $data['category'][2] = $this->utility->getFieldsCategory('Concurrent testing characteristics');
        $data['category'][3] = $this->utility->getFieldsCategory('Testing tool support');

        $data['name'][0] = 'Study identification';
        $data['name'][1] = 'Programming model';
        $data['name'][2] = 'General testing characteristics';
        $data['name'][3] = 'Concurrent testing characteristics';
        $data['name'][4] = 'Testing tool support';

        
        $count = 0;
        foreach($data['category'] as $fields) {
            $count2 = 0;
            foreach($fields as $field) {
                $data['category'][$count][$count2]['typeheadJS'] = $this->technique->singleTableInfo (ucfirst($field['html_id']));

                $tempExample = $this->technique->singleTableInfo (ucfirst($field['html_id']));
                $countExample = 0;
                $example = "";

                foreach ($tempExample as $value) {
                    if (strcasecmp($value, "No Information") != 0 && strcasecmp($value, "Not informed") != 0) {
                        $example .= ucfirst($value) . ', ';
                        if ($countExample++ >= 3) break;
                    }
                }
                $data['category'][$count][$count2]['example']=rtrim($example,", ");

                $count2++;
                // echo "<pre>";
                // print_r($field['typeheadJS']);
                // echo "</pre>";
            }
            $count++;
        }
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

        $this->load->view('admin/edit_technique_admin_page', $data);
    }

	public function updateTechnique ($targetID) {
		// remove se escolher no info !!!
        // verificar form no redirect !!
        // problem validating form, next release will fix

         //set validation rules
        $this->form_validation->set_rules('title','Technique Title','trim|required|min_length[3]|max_length[255]',
            array (     'required'      => 'You must provide a %s.',
                        'min_length'    => 'Your %s must have at least 3 characteres.',
                        'max_length'    => 'Your %s can have up to 255 characteres.'
                )
        );

        $this->form_validation->set_rules('year', 'Year', 'trim|max_length[4]',
            array (     'max_length'    => 'Your %s can have up to 4 characteres.'
                )
        );

        $this->form_validation->set_rules('bibitex', 'Bibliografic reference (Bibtex)', 'trim|max_length[10000]',
            array (     'required'      => 'You must provide a %s.',
                        'max_length'    => 'Your %s can have up to 10000 characteres.'
                )
        );

        $this->form_validation->set_rules('link', 'Link', 'trim|valid_url|max_length[2048]',
            array (     'valid_url'      => 'You must provide a valid %s.',
                        'max_length'    => 'Your %s can have up to 2048 characteres.'
                )
        );

        // Helper to get all table names
        $fields = $this->utility->getFields();

        // validate all other forms
        foreach ($fields['fields'] as $field) {
            $this->form_validation->set_rules( $field['html_id'], $field['html_label'], 'trim|max_length[255]',
                array (  'max_length'    => 'Your %s can have up to 255 characteres.'
                )
            );
        }

        //validate form input
        if ($this->form_validation->run() == FALSE) {
            // fails
            $this->editTechnique($targetID);

        } else {
            $sql = array(
                        'title'         => $this->input->post("title", TRUE),
                        'year'          => ($this->input->post("checkyear", TRUE) == 1 || $this->input->post("year", TRUE) == "") ? 'No Information' : '' . $this->input->post("year", TRUE),
                        'bibTex'        => ($this->input->post("checkbibtex", TRUE) == 1 || $this->input->post("bibtex", TRUE) == "") ? 'No Information' : '' . $this->input->post("bibtex", TRUE),
                        'link'          => ($this->input->post("checklink", TRUE) == 1 ||  $this->input->post("link", TRUE) == "") ? 'No Information' : '' . $this->input->post("link", TRUE)
                    );

            $answer = $this->technique->updateTechnique($sql, $targetID);

            // inserted            
            if ($answer === TRUE) {
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You successfully updated <strong>' . $sql['title'] . '</strong> technique.</div>');

                foreach ($fields['fields'] as $field) {
                    $this->technique->deleteAllTechniqueAtributes (ucfirst($field['html_id']), $targetID);

                    if ($this->input->post("check" . $field['html_id'], TRUE) == 1 ||  $this->input->post($field['html_id'], TRUE) == "") {

                        $sql = array( 'idTechnique' => $targetID, $field['html_id'] => 'No Information' );
                        $this->technique->insertTechniqueAtributes (ucfirst($field['html_id']), $sql);
                        // echo $this->db->last_query() . ";<br>";

                    } else {
                        $temp = explode(",", $this->input->post($field['html_id'], TRUE));

                        foreach ($temp as $value) {
                            $sql = array( 'idTechnique' => $targetID, $field['html_id'] => trim($value) );

                            $this->technique->insertTechniqueAtributes (ucfirst($field['html_id']), $sql);
                            // echo $this->db->last_query() . ";<br>";
                        }    
                    }
                }

                
                redirect(base_url('insert_test')); 
                
                redirect(base_url('admin/techniques')); 

            } else {
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Something went wrong with the database, please try again later.<br><strong>' . $answer . '</strong></div>');

                redirect(base_url('admin/techniques')); 
            }

            $this->session->set_flashdata('msg','<div class="alert alert-warning text-center">Unknown behavior, contact the administrator !</div>');

            redirect(base_url('admin/techniques'));
        }

    }






    // *********************************************************************************************************
    // ******************************************       USER        ********************************************
    // *********************************************************************************************************
    public function deleteUser ($id) {
        $this->user->deleteUserDatabase($id);
        redirect(base_url('admin/users'));
    }

    public function approveUserAdmin ($id) {
        $this->user->setAdmin($id);
        redirect(base_url('admin/users'));
    }

    public function disapproveUserAdmin ($id) {
        $this->user->unsetAdmin($id);
        redirect(base_url('admin/users'));
    }

    public function approveUser ($id) {
        $this->user->approveUserWithoutMailVerification($id);
        redirect(base_url('admin/users'));
    }

    public function editUser ($id) {
        $data['user'] = $this->user->buildUser($id);

        if (is_null($data['user'])) {
            redirect ('admin/users');
        }

        $this->load->view('admin/edit_user_admin_page', $data);
    }

    public function updateUser ($targetID)
    {
        //set validation rules
        $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric_spaces|min_length[3]|max_length[45]',
            array (    'required'                   => 'You must provide a %s.',
                        'alpha_numeric_spaces'      => 'You can only use letters and numbers on %s',
                        'min_length'                => 'Your %s must have at least 3 characteres.',
                        'max_length'                => 'Your %s can have up to 45 characteres.'
                )
        );

        // solve unique problem here
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|min_length[4]|max_length[255]',
            array ( 'required'      => 'You must provide a %s.',
                    'valid_email'   => 'You must provide a valid %s.',
                    'min_length'    => 'Your %s must have at least 4 characteres.',
                    'max_length'    => 'Your %s can have up to 255 characteres.'
            )
        );

        $this->form_validation->set_rules('fullname', 'Full Name', 'trim|required|alpha_numeric_spaces|min_length[4]|max_length[255]',
             array (    'required'                  => 'You must provide a %s.',
                        'alpha_numeric_spaces'      => 'You can only use letters and numbers on %s',
                        'min_length'                => 'Your %s must have at least 4 characteres.',
                        'max_length'                => 'Your %s can have up to 255 characteres.'
                )
        );

        $this->form_validation->set_rules('institution', 'Institution', 'trim|max_length[1023]',
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
                'FULLNAME'      => $this->input->post('fullname',TRUE),
                'EMAIL'         => $this->input->post('email',TRUE),
                'USERNAME'      => $this->input->post('username',TRUE),
                'INSTITUTION'   => (($this->input->post('institution',TRUE) == null) ? '' : $this->input->post('institution', TRUE))
            );
            
            // insert form data into database
            if ($this->user->updateUser($targetID, $data)) {
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You successfully updated '.$data['USERNAME'].' !</div>');

                redirect ('admin/users');
                
            } else {
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error updating '.$data['USERNAME'].' . Please try again later!!!</div>');

                redirect ('admin/users');
            }
        }
    }




    // *********************************************************************************************************
    // ******************************************       WEIGHT        ******************************************
    // *********************************************************************************************************
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

    


    // *********************************************************************************************************
    // ******************************************       CONTENT        *****************************************
    // *********************************************************************************************************
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