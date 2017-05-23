<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('register_model');
    }

	public function index()
	{
		$this->registerCheck();
    }

    function registerCheck()
    {
        //set validation rules
        $this->form_validation->set_rules('inputName', 'Full Name', 'trim|required|alpha_numeric_spaces|min_length[3]|max_length[255]');
        $this->form_validation->set_rules('inputUsername', 'Username', 'trim|required|alpha_dash|min_length[3]|max_length[45]');

        $this->form_validation->set_rules('inputEmail', 'Email', 'trim|required|valid_email|is_unique[user.EMAIL]|matches[inputEmailConfirm]');
        $this->form_validation->set_rules('inputEmailConfirm', 'Confirm Email', 'trim|required|valid_email');

        $this->form_validation->set_rules('inputPassword', 'Password', 'trim|required|matches[inputPasswordConfirm]');
        $this->form_validation->set_rules('inputPasswordConfirm', 'Confirm Password', 'trim|required');

        $this->form_validation->set_rules('inputInstitution', 'Institution', 'trim|alpha_numeric_spaces|max_length[255]');
        
        $this->form_validation->set_rules('g-recaptcha-response','Captcha','callback_recaptcha');

        //validate form input
        if ($this->form_validation->run() == FALSE) {
            // fails
            $this->load->view('templates/header');
            $this->load->view('register_page');
            $this->load->view('templates/footer');
        
        } else {
            // Prepare the query to insert database, based on post form
            $data = array(
                'FULLNAME'      => $this->input->post('inputName'),
                'EMAIL'         => $this->input->post('inputEmail'),
                'PASSWORD'      => md5($this->input->post('inputPassword')),
                'USERNAME'      => $this->input->post('inputUsername'),
                'INSTITUTION'   => $this->input->post('inputInstitution'),
                'ACTIVATIONKEY' => md5($this->input->post('inputName').$this->input->post('inputEmail'))
            );
            
            // insert form data into database
            if ($this->register_model->insertUser($data)) {
                // send email
                if ( $this->register_model->sendEmail($data['ACTIVATIONKEY'], $data['EMAIL']) ) {
                    // successfully sent mail
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered! Please confirm the mail sent to your Email !</div>');

                    redirect(base_url('register'));

                } else {
                    // error
                    $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                    redirect(base_url('register'));
                }

            } else {
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                redirect(base_url('register'));
            }
        }
    }
    
    // CAPTCHA CALLBACK
    public function recaptcha($str)
    {
        $secret_key = '6Le0dyIUAAAAADEzjrNITm4n_FoxMMK0UaxR6Fro';
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response='.$_POST['g-recaptcha-response'];
        $response = @file_get_contents($url);
        $data = json_decode($response, true);
        
        if($data['success']) {
            return true;
        } else {
            $this->form_validation->set_message('recaptcha', 'Please confirm you are human');
            return false;
        }
    }


    public function verify($hash)
    {
        if ($this->register_model->verifyEmailID($hash)) {
            $this->session->set_flashdata('verify_msg','<div class="alert alert-success text-center">Your Email Address is successfully verified! Please login to access your account!</div>');

            redirect(base_url('register'));
        } else {
            $this->session->set_flashdata('verify_msg','<div class="alert alert-danger text-center">Sorry! There is error verifying your Email Address!</div>');
            redirect(base_url('register'));
        }
    }

}
?>