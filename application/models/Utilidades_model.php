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
				'idField'       	=> $row->idField,
				'atribute'      	=> $row->atribute,
				'category'      	=> $row->category,
				'weight'      		=> $row->weight,
				'html_id'   		=> $row->html_id,
				'html_name'   		=> $row->html_name,
				'html_row_count'   	=> $row->html_row_count,
				'html_label'    	=> $row->html_label,
				'html_placeholder'  => $row->html_placeholder,
				'html_info'    		=> $row->html_info
				);
		}

      return $data;  
	}

	function getFieldsCategory ($category) {
		$query = $this->db->select ('*')->from('Field')->where('category =  ', $category)->get();
		$count = 0;
		foreach ($query->result() as $row) {    
			$data[$count++] = array ( 
				'idField'       	=> $row->idField,
				'atribute'      	=> $row->atribute,
				'category'      	=> $row->category,
				'weight'      		=> $row->weight,
				'html_id'   		=> $row->html_id,
				'html_name'   		=> $row->html_name,
				'html_row_count'   	=> $row->html_row_count,
				'html_label'    	=> $row->html_label,
				'html_placeholder'  => $row->html_placeholder,
				'html_info'    		=> $row->html_info,
				'html_code'    		=> $row->html_code
				);
		}
		return $data;  
	}

	function updateFieldWeight($key, $value)
	{
		$data = array ( 'weight' => $value );
		$this->db->where('html_id', $key);
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