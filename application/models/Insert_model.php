<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Insert_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    //insert into user table
    function insertRecordTechnique($data)
    {
        return $this->db->insert('caracterization', $data);
    }
    
}
?>