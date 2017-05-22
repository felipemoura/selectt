<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->helper('date');
    }
    
    //insert into user table
    function findUser ($username, $password)
    {
      $this->db->select ('*');
      $this->db->from('user');
      $this->db->where('USERNAME', $username);
      $this->db->where('PASSWORD', md5($password));
      $this->db->limit(1);

      $query = $this->db->get();

      if($query->num_rows() == 1) {
        return $query->row_array();
      } else {
       return false;
      }  
    }

    function updateLastLogin($id)
    {
      $data = array( 'LASTLOGIN' => date('Y-m-d H:i:s',now()));
      $this->db->where('ID', $id);
      $this->db->update('user', $data); 
    }

}
?>