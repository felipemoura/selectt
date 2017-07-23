<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Utilidades_model extends CI_Model
{
	function __construct()
	{
        // Call the Model constructor
		parent::__construct();
	}

	// WEIGHTS function
	function getFields () {
		$study = 'Study Identification';
		$query = $this->db->select ('*')->from('Field')->where('category !=  ', $study)->get();

		$count = 0;
		foreach ($query->result() as $row) {    
			$data['fields'][$count++] = array ( 
				'idField'       => $row->idField,
				'atribute'      => $row->atribute,
				'weight'      	=> $row->weight,
				'html_ID'   	=> $row->html_ID,
				'html_Name'   	=> $row->html_Name,
				'html_label'    => $row->html_label
				);
		}

      return $data;  
	}

	function updateField($key, $value)
	{
		$data = array ( 'weight' => $value );
		$this->db->where('html_ID', $key);
		$this->db->update('Field', $data);
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


	// Logado
	function getLogadoText () {
		$this->db->select ('*');
		$this->db->from('logado');
		$this->db->limit(1);
		$query = $this->db->get();


		return $query->row_array();
	}

	function updateLogadoText ($text, $id) {
		$data = array( 'TEXT' => $text );

		$this->db->where('ID', $id);
		$this->db->update('logado', $data); 
	}
}

?>