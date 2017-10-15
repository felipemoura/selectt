<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
 	{
   		parent::__construct();
   		$this->load->model('login_model');

   		if ($this->session->userdata('attempt') === NULL) {
            $cookie = array( 'attempt'		=> 0 );
            $this->session->set_userdata($cookie);
        }
 	}

	public function index()
	{
		$this->load->view('account/login_page');
	}

	public function loginCheck () {
		// check if failed 3 attempts
		if ($this->session->userdata('attempt') >= 3) {
            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You had 3 wrong attempts, you are blocker for 10 minutes please try again later!</div>');
            redirect(base_url('login'));
        }


		$username = $this->input->post("inputUsername", TRUE);
		$password = $this->input->post("inputPassword", TRUE);
		
		$answer = $this->login_model->findUser($username, $password);

		//Se o usuário e senha combinarem, então basta eu redirecionar para a url base, pois agora o usuário irá passa
		//pela verificação que checa se ele está logado.
		if ($answer) {

			// user is not verified yet
			if ($answer['STATUS'] == 0) {
				$this->session->set_flashdata('msg','<div class="alert alert-warning text-center">Username not verified yet ! Please verify your Email !</div>');

				redirect(base_url('login'));

			} else {
				$cookie = array(
						'ID'			=> $answer['ID'],
				        'username'  	=> $answer['USERNAME'],
				        'name'			=> $answer['FULLNAME'],
				        'email'     	=> $answer['EMAIL'] ,
				        'logged_in' 	=> TRUE,
				        'is_admin'		=> $answer['ISADMIN'],
				        'is_verifyed' 	=> $answer['STATUS'],
				        'attempt'		=> 0
				);

				// setting cookie, and if is admin or not
				$this->session->set_userdata($cookie);

				// update last login
				$this->login_model->updateLastLogin($answer['ID']);
				
				redirect(base_url('home'));
			}

		} else {
			//caso a senha/usuário estejam incorretos, então mando o usuário novamente para a tela de login com uma mensagem de erro.
			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Username or Password incorrect !</div>');
			
			$attempt = $this->session->userdata('attempt');
			$this->session->set_userdata('attempt', ++$attempt);

			redirect(base_url('login'));
		}
	}

	public function logout(){
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('result_user');
		
		$this->session->set_flashdata('msg','<div class="alert alert-success text-center">You logged out successfully, please come back again soon !!</div>');


		redirect(base_url('login'));	
	}
}
?>