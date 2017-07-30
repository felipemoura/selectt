<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Insert_test extends MY_Controller {
 
    function __construct()
    {
        parent::__construct();
        $this->load->model('Utilidades_model', 'utility');
        $this->load->model('Technique', 'technique');
    }

	public function index()
	{
        $this->loadView();
	} 

    public function loadView ()
    {
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

        $this->load->view('insert/insert_page', $data);
    }

    public function insert_database()
    {
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
            $this->loadView();

        } else {

            $sql = array(
                        'title'         => $this->input->post("title", TRUE),
                        'year'          => ($this->input->post("checkyear", TRUE) == 1 || $this->input->post("year", TRUE) == "") ? 'No Information' : '' . $this->input->post("year", TRUE),
                        'bibTex'        => ($this->input->post("checkbibtex", TRUE) == 1 || $this->input->post("bibtex", TRUE) == "") ? 'No Information' : '' . $this->input->post("bibtex", TRUE),
                        'link'          => ($this->input->post("checklink", TRUE) == 1 ||  $this->input->post("link", TRUE) == "") ? 'No Information' : '' . $this->input->post("link", TRUE),
                        'needApproval'   => 1,
                        'insertedBy'    => $this->session->userdata("username"),
                        'insertedOn'    => date("Y-m-d H:i:s")
                    );


            $answer = $this->technique->insertTechnique($sql);

            // inserted            
            if ($answer === TRUE) {
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You successfully added <strong>' . $sql['title'] . '</strong> technique to database, the administrator will answer it soon.</div>');

                $id = $this->db->insert_id();

                // echo $this->db->last_query() . ";<br>";

                foreach ($fields['fields'] as $field) {
                    if ($this->input->post("check" . $field['html_id'], TRUE) == 1 ||  $this->input->post($field['html_id'], TRUE) == "") {

                        $sql = array( 'idTechnique' => $id, $field['html_id'] => 'No Information' );
                        $this->technique->insertTechniqueAtributes (ucfirst($field['html_id']), $sql);
                        // echo $this->db->last_query() . ";<br>";

                    } else {
                        $temp = explode(",", $this->input->post($field['html_id'], TRUE));
                    
                        foreach ($temp as $value) {
                            $sql = array( 'idTechnique' => $id, $field['html_id'] => trim($value) );

                            $this->technique->insertTechniqueAtributes (ucfirst($field['html_id']), $sql);
                            // echo $this->db->last_query() . ";<br>";
                        }    
                    }
                }

                
                redirect(base_url('insert_test')); 

            } else {
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Something went wrong with the database, please try again later.<br><strong>' . $answer . '</strong></div>');

                redirect(base_url('insert_test')); 
            }

            $this->session->set_flashdata('msg','<div class="alert alert-warning text-center">Unknown behavior, contact the administrator !</div>');

            redirect(base_url('insert_test'));
        }

    }


}

?>