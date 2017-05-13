<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Insert_test extends MY_Controller {
 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->model('insert_model');
    }

	public function index()
	{

        $data['id'] = $this->insert_model->buildId();
        $data['name'] = $this->insert_model->buildName();
        // $data['error'] = ' ';


		$this->load->view('templates/header_logged');
		$this->load->view('logged/insert_page', $data);
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

    function checkFormInsert()
    {
        //set validation rules
        $this->form_validation->set_rules('inputName', 'Full Name', 'trim|required|alpha|min_length[3]|max_length[255]');
        $this->form_validation->set_rules('inputUsername', 'Username', 'trim|required|alpha|min_length[3]|max_length[45]');

        $this->form_validation->set_rules('inputEmail', 'Email', 'trim|required|valid_email|is_unique[user.EMAIL]|matches[inputEmailConfirm]');
        $this->form_validation->set_rules('inputEmailConfirm', 'Confirm Email', 'trim|required|valid_email');

        $this->form_validation->set_rules('inputPassword', 'Password', 'trim|required|matches[inputPasswordConfirm]');
        $this->form_validation->set_rules('inputPasswordConfirm', 'Confirm Password', 'trim|required');

        $this->form_validation->set_rules('inputInstitution', 'Institution', 'trim|alpha|max_length[255]');
        
        //validate form input
        if ($this->form_validation->run() == FALSE) {
            // fails
            $this->load->view('templates/header_logged');
            $this->load->view('logged/form_page');
            $this->load->view('templates/footer');
        
        } else {
            // Prepare the query to insert database, based on post form
            $data = array(
                'FULLNAME'      => $this->input->post('inputName'),
                'EMAIL'         => $this->input->post('inputEmail'),
                'PASSWORD'      => md5($this->input->post('inputPassword')),
                'USERNAME'      => $this->input->post('inputUsername'),
                'INSTITUTION'   => $this->input->post('inputInstitution')
            );
            
            // insert form data into database
            if ($this->form_model->insertRecordTechnique($data))
            {
                // send email
                if (TRUE)//$this->form_model->sendEmail($this->input->post('email')))
                {
                    // successfully sent mail
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered! Please confirm the mail sent to your Email-ID!!!</div>');

                    redirect(base_url('index.php/register'));
                }
                else
                {
                    // error
                    $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                    redirect(base_url('index.php/register'));
                }
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                redirect(base_url('index.php/register'));
            }
        }
    }

}


?>
