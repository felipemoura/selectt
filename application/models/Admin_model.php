<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function getAllUserInfo ($id) {
        $this->db->select ('*');
        $this->db->from('user');
        $this->db->where('ID', $id);
        $this->db->limit(1);
        $query = $this->db->get();
        $row = $query->row_array();

         // prepare data
        $buildField = array(
                    'ID'            => $row['ID'] ,
                    'FULLNAME'      => $row['FULLNAME'] ,
                    'EMAIL'         => $row['EMAIL'] ,
                    'USERNAME'      => $row['USERNAME'] ,
                    'INSTITUTION'   => $row['INSTITUTION']
                );

        return $buildField;
    }

    function getAllFieldInfo ($id) {
        $this->db->select ('*');
        $this->db->from('caracterization');
        $this->db->where('ID', $id);
        $this->db->limit(1);
        $query = $this->db->get();
        $row = $query->row_array();

        // prepare data
        $buildField = array(
                    'ID'                              => $row['ID'] ,
                    'Title'                           => $row['Title'] ,
                    'ApproachTechniqueName'           => $row['Approach'] ,
                    'Year'                            => $row['Year'] ,
                    'Technique Link'                  => $row['TechniqueLink'],
                    'Bibliografic Reference'          => $row['BibliograficReference'] ,
                    'Development Paradigm'            => $row['DevelopmentParadigm'] ,
                    'Software Execution Platform'     => $row['SoftwareExecutionPlatform'] ,
                    'Software Language'               => $row['SoftwareLanguage'] ,
                    'Typeof Testing Technique'        => $row['TypeofTestingTechnique'] ,
                    'Testing Level'                   => $row['TestingLevel'] ,
                    'Test Case Generation Criteria'   => $row['TestCaseGenerationCriteria'] ,
                    'Inputs Required'                 => $row['InputsRequired'] ,
                    'Results Generated'               => $row['ResultsGenerated'] ,
                    'Failures Revealed'               => $row['FailuresRevealed'] ,
                    'Quality Attributes'              => $row['QualityAttributes'] ,
                    'Concurrent Bug Pattern'          => $row['ConcurrentBugPattern'] ,
                    'Graphical Representation'        => $row['GraphicalRepresentation'] ,
                    'Type of analysis'                => $row['Typeofanalysis'] ,
                    'Paradigm'                        => $row['Paradigm'] ,
                    'Mechanism Of Replay'             => $row['MechanismOfReplay'] ,
                    'Instrumentation'                 => $row['Instrumentation'] ,
                    'StateSpace'                      => $row['StateSpace'] ,
                    'Tool'                            => $row['Tool'] ,
                    'Tool Ref Catalog'                => $row['ToolRefCatalog'] ,
                    'Automation Level'                => $row['AutomationLevel'] ,
                    'Platform Operation'              => $row['PlatformOperation'] ,
                    'ToolCost'                        => $row['ToolCost']
                );
        return $buildField;
    }
    
    function loadUsers () {
      $this->db->select ('*');
      $this->db->from('user');
      $query = $this->db->get();
      $count = 0;

      foreach ($query->result() as $row) {    
        $data['info'][$count++] = array ( 'ID'            => $row->ID,
                                          'FULLNAME'      => $row->FULLNAME,
                                          'USERNAME'      => $row->USERNAME,
                                          'EMAIL'         => $row->EMAIL,
                                          'INSTITUTION'   => $row->INSTITUTION,
                                          'ISADMIN'       => $row->ISADMIN,
                                          'STATUS'        => $row->STATUS,
                                          'CREATED'       => $row->CREATED,
                                          'LASTLOGIN'     => $row->LASTLOGIN
                                        );
      }
    
      return $data;  
    }

    // update technique
      function updateRegister ($id, $data) 
    {
      $this->db->where('ID', $id);
      return $this->db->update('caracterization', $data); 
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
      $this->db->where('ID', $id);
      return $this->db->update('user', $data); 
    }
}
?>