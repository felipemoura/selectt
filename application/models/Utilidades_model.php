<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Utilidades_model extends CI_Model
{
	function __construct()
	{
        // Call the Model constructor
		parent::__construct();
	}


	// Home
	function getHomeText () {
		$this->db->select ('*');
		$this->db->from('home');
		$this->db->limit(1);
		$query = $this->db->get();


		return $query->row_array();
	}

	function updateHomeText ($text, $id) {
		$data = array( 'TEXT' => $text );

		$this->db->where('ID', $id);
		$this->db->update('home', $data); 
	}



	//  Publication
	function getPublicationText () {
		$this->db->select ('*');
		$this->db->from('publication');
		$this->db->limit(1);
		$query = $this->db->get();


		return $query->row_array();
	}

	function updatePublicationText ($text, $id) {
		$data = array( 'TEXT' => $text );

		$this->db->where('ID', $id);
		$this->db->update('publication', $data); 
	}



	// People
	function getPeopleText () {
		$this->db->select ('*');
		$this->db->from('people');
		$this->db->limit(1);
		$query = $this->db->get();


		return $query->row_array();
	}

	function updatePeopleText ($text, $id) {
		$data = array( 'TEXT' => $text );

		$this->db->where('ID', $id);
		$this->db->update('people', $data); 
	}

}

?>