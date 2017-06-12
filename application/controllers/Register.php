<?php defined('BASEPATH') OR exit('No direct script access allowed');

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
        $this->form_validation->set_rules('inputName', 'Full Name', 'trim|required|alpha_numeric_spaces|min_length[3]|max_length[255]',
            array (     'required'      => 'You must provide a %s.',
                        'alpha_numeric_spaces'    => 'You can only use letters and numbers on %s',
                        'min_length'    => 'Your %s must have at least 3 characteres.',
                        'max_length'    => 'Your %s can have up to 255 characteres.'
                )

        );

        $this->form_validation->set_rules('inputUsername', 'Username', 'trim|required|alpha_numeric_spaces|is_unique[user.USERNAME|min_length[3]|max_length[45]',
            array (     'required'      => 'You must provide a %s.',
                        'alpha_numeric_spaces'    => 'You can only use letters and underscore on %s',
                        'min_length'    => 'Your %s must have at least 3 characteres.',
                        'max_length'    => 'Your %s can have up to 45 characteres.',
                        'is_unique'     => 'This %s is already in use, please use another.'
                )
        );

        $this->form_validation->set_rules('inputEmail', 'Email', 'trim|required|valid_email|is_unique[user.EMAIL]|matches[inputEmailConfirm]',
                array ( 'required'      => 'You must provide a %s.',
                        'valid_email'   => 'You must provide a valid %s.',
                        'is_unique'     => 'This %s is already in use, please use another.',
                        'matches'       => 'This %s does not match the confirmation email.'
                )
        );
        
        $this->form_validation->set_rules('inputEmailConfirm', 'Confirm Email', 'trim|required|valid_email',
                array ( 'required'      => 'You must provide a %s.',
                        'valid_email'   => 'You must provide a valid %s.'
                )
        );

        $this->form_validation->set_rules('inputPassword', 'Password', 'trim|required|alpha_numeric_spaces|matches[inputPasswordConfirm]',
            array (     'required'      => 'You must provide a %s.',
                        'alpha_numeric_spaces'    => 'You can only use letters and numbers on %s',
                        'matches'       => 'This %s does not match the confirmation password.'
                )
        );

        $this->form_validation->set_rules('inputPasswordConfirm', 'Confirm Password', 'trim|required|alpha_numeric_spaces',
            array (     'required'      => 'You must provide a %s.',
                        'alpha_numeric_spaces'    => 'You can only use letters and numbers on %s'
                )
        );

        $this->form_validation->set_rules('inputInstitution', 'Institution', 'trim|alpha_numeric_spaces|max_length[255]',
            array (     'alpha_numeric_spaces'    => 'You can only use letters and numbers on %s',
                        'max_length'    => 'Your %s can have up to 255 characteres.'
                )
        );
        
        $this->form_validation->set_rules('g-recaptcha-response','Captcha','callback_recaptcha');

        //validate form input
        if ($this->form_validation->run() == FALSE) {
            // fails
            $this->load->view('templates/header');
            $this->load->view('account/register_page');
            $this->load->view('templates/footer');
        
        } else {
            // Prepare the query to insert database, based on post form
            $data = array(
                'FULLNAME'      => $this->input->post('inputName', TRUE),
                'EMAIL'         => $this->input->post('inputEmail', TRUE),
                'PASSWORD'      => md5($this->input->post('inputPassword', TRUE)),
                'USERNAME'      => $this->input->post('inputUsername', TRUE),
                'INSTITUTION'   => $this->input->post('inputInstitution', TRUE),
                'ACTIVATIONKEY' => md5($this->input->post('inputName',TRUE).$this->input->post('inputEmail',TRUE)),
                'CREATED'       => date("Y-m-d H:i:s")
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
            $this->form_validation->set_message('recaptcha', 'Wrong captcha, please confirm you are human !');
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