<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
 	{
   		parent::__construct();
   		$this->load->model('login_model');
 	}

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('account/login_page');
		$this->load->view('templates/footer');
	}

	public function loginCheck () {
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
				        'is_verifyed' 	=> $answer['STATUS']
				);

				// setting cookie, and if is admin or not
				$this->session->set_userdata($cookie);

				// update last login
				$this->login_model->updateLastLogin($answer['ID']);
				
				redirect(base_url('logged'));
			}

		} else {
			//caso a senha/usuário estejam incorretos, então mando o usuário novamente para a tela de login com uma mensagem de erro.
			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Username or Password incorrect !</div>');
			redirect(base_url('login'));
		}
	}

	public function logout(){
		$this->session->unset_userdata('logged_in');
		redirect(base_url('login'));	
	}
}
?>