<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
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

      if($query->num_rows() == 1)
      {
        $row = $query->row_array();
        return $row;
      }
      else
      {
       return false;
      }  
    }


}
?>