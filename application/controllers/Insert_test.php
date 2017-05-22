<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Insert_test extends MY_Controller {
 
    function __construct()
    {
        parent::__construct();
        $this->load->model('insert_model');
    }

	public function index()
	{
        $data['id']   = $this->insert_model->buildId();
        $data['name'] = $this->insert_model->buildName();

        $this->load->view('templates/header_logged');
        $this->load->view('logged/insert_page', $data);
        $this->load->view('templates/footer');
	} 


	public function insert_database()
    {
        // fazer verificacao de sql na db, se foi e erros
        //fazer a page customizavel, com n coluns diferentes

        // useful variables
        $id     = $this->insert_model->buildId();
        $name   = $this->insert_model->buildName();
        $field  = $this->insert_model->buildFields();

        //set validation rules
        $this->form_validation->set_rules('inputApproachTechniqueName', 'Technique Name', 'trim|required|alpha_dash|min_length[3]|max_length[700]');        
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
                    'Approach'   => $this->input->post("inputApproachTechniqueName"));

        foreach ($field as $key => $value) {
            $sql[$value] = ($this->input->post('checkinput'.$value) == 1) ? 'No information' : ''.$this->input->post('input'.$value);
        }

        $str = $this->insert_model->insertRecordTechnique($sql);
        if ($str == "true") {
            $data['id']   = $this->insert_model->buildId();
            $data['name'] = $this->insert_model->buildName();
            $data['success'] = "You successfully added <strong>" . $sql['Approach'] . "</strong> technique to database, the administrator will answer it soon.";

            $this->load->view('templates/header_logged');
            $this->load->view('logged/insert_page', $data);
            $this->load->view('templates/footer');


        } else {
            $data['id']   = $this->insert_model->buildId();
            $data['name'] = $this->insert_model->buildName();
            $data['error'] = "Something went wrong with the database, please try again later.<br><strong>".$str."</strong>";

            $this->load->view('templates/header_logged');
            $this->load->view('logged/insert_page', $data);
            $this->load->view('templates/footer');

        }

         $data['warning'] = "Unknown behavior, contact the administrator !";

        $this->load->view('templates/header_logged');
        $this->load->view('logged/insert_page', $data);
        $this->load->view('templates/footer');

        
    }

}
?>
