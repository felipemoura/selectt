<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Available_techniques_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    //insert into user table
    function loadRegisters ()
    {
      $this->db->select ('*');
      $this->db->from('techniques');
      $query = $this->db->get();
      $count = 0;

      foreach ($query->result() as $row) {
          $data['info'][$count++] = array ( 
                                            'ID'                    => $row->ID,                                   
                                            'Title'                 => $row->Title,
                                            'Reference'             => $row->Reference,
                                            'Technique'             => $row->Technique,
                                            'Approach'              => $row->Approach,
                                            'Type of Analysis'      => $row->Typeofanalysis,
                                            'Paradigm'              => $row->Paradigm,
                                            'Language'              => $row->Language,
                                            'Concurrent Bug'        => $row->ConcurrentBug,
                                            'Supporting Tool'       => $row->SupportingTool,
                                            'Evidence'              => $row->Evidence     
                                         );
      }

      return $data;  
    }
}
?>
