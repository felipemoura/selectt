<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    // USERS functions
    function deleteUserDatabase ($id) 
    {
      $this->db->delete ('user', array('ID' =>  $id));
    }

    function setAdmin ($id)
    {
      $data = array( 'ISADMIN' => 1 );
      $this->db->where('ID', $id);
      $this->db->update('user', $data);
    }

    function unsetAdmin ($id)
    {
      $data = array( 'ISADMIN' => 0 );
      $this->db->where('ID', $id);
      $this->db->update('user', $data); 
    }

    function approveUserWithoutMailVerification($id)
    {
      $data = array( 'STATUS' => 1 );
      $this->db->where('ID', $id);
      $this->db->update('user', $data);
    }

    function updateUser ($id, $data)
    {
      $this->db->where('ID', $id)->update('user', $data); 

      if ($this->db->affected_rows() != 1) {
        $error = $this->db->error();

        if ($error['code'] == 1062) {
          return "Sorry but this user is already in database!";
        } else {
          return "Unknown error, please contact the administrator !";
        }

      } else {
        return TRUE;
      }
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
