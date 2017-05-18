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
      $this->db->select ('ID, Approach, Title, Technique, Language');
      $this->db->from('techniques');
      $query = $this->db->get();
      $count = 0;

      foreach ($query->result() as $row) {
        $data['info'][$count++] = array ( 'id'        => $row->ID, 
                                          'approach'  => $row->Approach,
                                          'title'     => $row->Title, 
                                          'technique' => $row->Technique,
                                          'language'  => $row->Language
                                          );
      }

      return $data;  
    }

    function getAllFieldInfo ($id) {
        $this->db->select ('*');
        $this->db->from('techniques');
        $this->db->where('ID', $id);
        $this->db->limit(1);

        $query = $this->db->get();
        $row = $query->row_array();
        $count = $query->num_rows();

        // prepare data
        $buildField = array(
                    'Title'                 => (($count == 0 ) ? "Not in database" : $row['Title']),
                    'Reference'             => (($count == 0 ) ? ""                : $row['Reference']),
                    'Technique'             => (($count == 0 ) ? "Not in database" : $row['Technique']),
                    'Approach'              => (($count == 0 ) ? "Not in database" : $row['Approach']),
                    'Typeofanalysis'        => (($count == 0 ) ? "Not in database" : $row['Typeofanalysis']) ,
                    'Paradigm'              => (($count == 0 ) ? "Not in database" : $row['Paradigm']) ,
                    'Language'              => (($count == 0 ) ? "Not in database" : $row['Language']) ,
                    'Language'              => (($count == 0 ) ? "Not in database" : $row['Language']) ,
                    'ConcurrentBug'         => (($count == 0 ) ? "Not in database" : $row['ConcurrentBug']) ,
                    'SupportingTool'        => (($count == 0 ) ? "Not in database" : $row['SupportingTool']) ,
                    'Evidence'              => (($count == 0 ) ? "Not in database" : $row['Evidence'])
                );


        return $buildField;
    }

}
?>