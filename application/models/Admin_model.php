<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    //insert into user table
    function loadRegisters ()
    {
      $this->db->select ('ID, Approach, Title, Year');
      $this->db->from('caracterization');

      $query = $this->db->get();
      $count = 0;

      foreach ($query->result() as $row) {
        $data['info'][$count++] = array ( 'id'    => $row->ID, 
                                          'name'  => $row->Approach,
                                          'title' => $row->Title, 
                                          'year'  => $row->Year
                                          );
      }
      
      $data['count'] = $query->num_rows();
      return $data;  
    }

    function deleteRegister ($id) 
    {
      $this->db->delete ('caracterization', array('ID' =>  $id));
    }


}
?>