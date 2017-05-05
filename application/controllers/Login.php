<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
 	{
   		parent::__construct();
   		$this->load->model('login_model');
 	}

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('login_page');
		$this->load->view('templates/footer');
	}

	public function loginCheck () {
		$username = $this->input->post("inputUsername");
		$password = $this->input->post("inputPassword");
		
		$answer = $this->login_model->findUser($username, $password);


		//Se o usuário e senha combinarem, então basta eu redirecionar para a url base, pois agora o usuário irá passa
		//pela verificação que checa se ele está logado.
		if ($answer) {
			$this->session->set_userdata("logged", 1);
			redirect('logged');

		} else {
			//caso a senha/usuário estejam incorretos, então mando o usuário novamente para a tela de login com uma mensagem de erro.
			$data['error'] = "Username or Password incorrect !";


			$this->load->view('templates/header');
			$this->load->view('login_page', $data);
			$this->load->view('templates/footer');
		}
	}


	public function logout(){
		$this->session->unset_userdata("logged");
		redirect(base_url());	
	}
}
?>