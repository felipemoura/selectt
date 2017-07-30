<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Teste extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('teste');
	}	

	public function postado () 
	{
	// 	$this->db->select ('*');
	// 	$this->db->from('Technique');
	// 	$this->db->limit(1);
	// 	$result = $this->db->get()->result();
	// 	echo json_encode($result);
		echo $this->input->post('title') . "<br>";
		echo $this->input->post('bibTex');
	}
}

?>