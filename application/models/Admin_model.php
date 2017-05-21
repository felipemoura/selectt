<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
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

    
    //insert into user table
    function loadRegisters ()
    {
      $this->db->select ('*');
      $this->db->from('caracterization');
      $query = $this->db->get();
      $count = 0;

      foreach ($query->result() as $row) {
        $data['info'][$count++] = array ( 'ID'                           => $row->ID,
                                          'Title'                        => $row->Title,
                                          'Year'                         => $row->Year,
                                          'Approach'                     => $row->Approach,
                                          'BibliograficReference'        => $row->BibliograficReference,
                                          'TechniqueLink'                => $row->TechniqueLink,
                                          'DevelopmentParadigm'          => $row->DevelopmentParadigm,
                                          'SoftwareExecutionPlatform'    => $row->SoftwareExecutionPlatform,
                                          'SoftwareLanguage'             => $row->SoftwareLanguage,
                                          'TypeofTestingTechnique'       => $row->TypeofTestingTechnique,
                                          'TestingLevel'                 => $row->TestingLevel,
                                          'TestCaseGenerationCriteria'   => $row->TestCaseGenerationCriteria,
                                          'InputsRequired'               => $row->InputsRequired,
                                          'ResultsGenerated'             => $row->ResultsGenerated,
                                          'FailuresRevealed'             => $row->FailuresRevealed,
                                          'QualityAttributes'            => $row->QualityAttributes,
                                          'ConcurrentBugPattern'         => $row->ConcurrentBugPattern,
                                          'GraphicalRepresentation'      => $row->GraphicalRepresentation,
                                          'Typeofanalysis'               => $row->Typeofanalysis,
                                          'Paradigm'                     => $row->Paradigm,
                                          'MechanismOfReplay'            => $row->MechanismOfReplay,
                                          'Instrumentation'              => $row->Instrumentation,
                                          'StateSpace'                   => $row->StateSpace,
                                          'Tool'                         => $row->Tool,
                                          'ToolRefCatalog'               => $row->ToolRefCatalog,
                                          'AutomationLevel'              => $row->AutomationLevel,
                                          'PlatformOperation'            => $row->PlatformOperation,
                                          'ToolCost'                     => $row->ToolCost,
                                          'Approval'                     => $row->NeedApproval
                                        );
      }
    
      return $data;  
    }

    function deleteRegister ($id) 
    {
      $this->db->delete ('caracterization', array('ID' =>  $id));
    }

    function approveRegister ($id) 
    {
      $data = array( 'NeedApproval' => 0 );
      $this->db->where('ID', $id);
      $this->db->update('caracterization', $data); 
    }

    function updateRegister ($id, $data) 
    {
      $this->db->where('ID', $id);
      $this->db->update('caracterization', $data); 
    }
}
?>