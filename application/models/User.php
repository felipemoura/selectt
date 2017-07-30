<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    // Get all techniques for admin page
    function getAllUsers ()
    {
      $query = $this->db->select('*')->from('user')->get();
      $count = 0;
      $data = null;

      foreach ($query->result() as $row) {    
        $data['info'][$count++] = array ( 
          'ID'                              => $row->ID,
          'FULLNAME'                        => $row->FULLNAME,
          'EMAIL'                           => $row->EMAIL,
          'USERNAME'                        => $row->USERNAME,
          'ISADMIN'                         => $row->ISADMIN,
          'STATUS'                          => $row->STATUS,
          'CREATED'                         => $row->CREATED,
          'LASTLOGIN'                       => $row->LASTLOGIN
          );
      }

      return $data;  
    }


    // build all info from one user
    function buildUser ($id)
    {
      $query = null;
      $fields = 'ID,FULLNAME,EMAIL,USERNAME,INSTITUTION,ISADMIN,STATUS,CREATED,LASTLOGIN';

      $query = $this->db->select($fields)->from('user')->where('id', $id)->limit(1)->get();

      if ($query->num_rows() === 1) 
      {
        return $query->row_array();

      }
      else 
      {
        return null;
      }
    }

}
?>
