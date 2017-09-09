<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('email');
    }

	public function index()
	{		
		$this->load->view('home/contact_page');
	}

	public function sendContactMail() 
	{
        $this->form_validation->set_rules('inputName', 	'Name', 'trim|required|alpha|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('inputEmail', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('inputPhoneNumber', 'Phone Number', 'trim|alpha_numeric_spaces');
        $this->form_validation->set_rules('inputInstitution', 'Institution', 'trim|alpha_numeric_spaces');
        $this->form_validation->set_rules('inputSubject', 'Subject', 'trim|alpha_numeric_spaces|max_length[1024]');
        $this->form_validation->set_rules('inputMessage', 'Message', 'trim|alpha_numeric_spaces|required|min_length[10]|max_length[1024]');
        $this->form_validation->set_rules('g-recaptcha-response','Captcha','callback_recaptcha');
 
        //validate form input
        if ($this->form_validation->run() == FALSE) {
			$this->load->view('home/contact_page');

		} else {
			// prepare message
			$data = array(
                'name' 			=> $this->input->post('inputName'),
                'email' 		=> $this->input->post('inputEmail'),
                'subject' 		=> $this->input->post('inputSubject'),
                'phoneNumber' 	=> $this->input->post('inputPhoneNumber'),
                'institution' 	=> $this->input->post('inputInstitution'),
                'message' 		=> $this->input->post('inputMessage')
            );

			$config['protocol'] = 'smtp';
		    $config['smtp_host'] = 'ssl://smtp.gmail.com';
		    $config['smtp_port'] = '465';
		    $config['smtp_user'] = 'selectttool@gmail.com';
		    $config['smtp_pass'] = 'selectt-labes';
		    $config['mailtype'] = 'html';
		    $config['wordwrap'] = TRUE;
		    $config['charset'] = 'iso-8859-1';
		    $config['newline'] = "\r\n";
		    $this->email->initialize($config);

			//configure email settings
			$this->email->from($data['email'], $data['name']);
			$this->email->to('selectttool@gmail.com');
			$this->email->subject('Contact form from ' . $data['name'] . ' - ' . $data['subject']);
			$this->email->message($data['message']);
			
			if ($this->email->send()) {
				// successfully sent mail
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You successfully sent mail ! Please wait for our response.</div>');

                redirect(base_url('contact'));

			} else {
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error. Could not send message. Please try again later!!!</div>');

                redirect(base_url('contact'));
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
}

?>