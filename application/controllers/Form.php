<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Form extends MY_Controller {
 
 	public function __construct()
    {
        parent::__construct();
        $this->load->model('Utilidades_model', 'utility');
        $this->load->model('Technique_model', 'technique');
        $this->load->model('Result_model', 'result');
    }

    public function index ()
    {
    	$this->loadView();
    }

	public function loadView()
	{
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
		$this->load->view('form/form_page', $data);
	}

	public function getResults ()
	{
		//set validation rules
        $this->form_validation->set_rules('title','Technique Title','trim|required|min_length[3]|max_length[255]',
            array (     'required'      => 'You must provide a %s.',
                        'min_length'    => 'Your %s must have at least 3 characteres.',
                        'max_length'    => 'Your %s can have up to 255 characteres.'
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

        	$sql = array( 	'title'         => $this->input->post("title", TRUE),
	                        'insertedBy'    => $this->session->userdata("username"),
	                        'insertedOn'    => date("Y-m-d H:i:s")
                    );

			$answer = $this->result->insertTechniqueResult($sql);

			// inserted            
			if ($answer === TRUE) {

				$id = $this->db->insert_id();

                foreach ($fields['fields'] as $field) {
                	if ($this->input->post("check" . $field['html_id'], TRUE) == 1 ||  $this->input->post($field['html_id'], TRUE) == "") {
                		$sql = array( 'idTechniqueResult' => $id, $field['html_id'] => 'No Information' );
                		$this->result->insertTechniqueResultAtributes ('Result' . ucfirst($field['html_id']), $sql);

                	} else {
                		$temp = explode(",", $this->input->post($field['html_id'], TRUE));

                		foreach ($temp as $value) {
                			$sql = array( 'idTechniqueResult' => $id, $field['html_id'] => trim($value) );

                			$this->result->insertTechniqueResultAtributes ('Result' . ucfirst($field['html_id']), $sql);
                		}    
                	}
                }

                // Last result on cookies
                $this->session->set_userdata( 
                		array('result_user' => $id)
                	);

                redirect(base_url('results')); 

            } else {
            	$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Something went wrong with the database, please try again later.<br></div>');

            	redirect(base_url('form')); 
            }

            $this->session->set_flashdata('msg','<div class="alert alert-warning text-center">Unknown behavior, contact the administrator !</div>');

            redirect(base_url('form'));
        }
    }

}

?>