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
    
    function getAllFieldInfo ($id) {
        $this->db->select ('*');
        $this->db->from('caracterization');
        $this->db->where('ID', $id);
        $this->db->limit(1);

        $query = $this->db->get();
        $row = $query->row_array();

        // prepare data
        $buildField = array(
                    'inputTitle'                        => $row['Title'],
                    'inputYear'                         => $row['Year'],
                    'inputPDF_File'                     => $row['PDF_File'],
                    'inputApproach'                     => $row['Approach'],
                    'inputBibliograficReference'        => $row['BibliograficReference'] ,
                    'inputDevelopmentParadigm'          => $row['DevelopmentParadigm'] ,
                    'inputSoftwareExecutionPlatform'    => $row['SoftwareExecutionPlatform'] ,
                    'inputSoftwareLanguage'             => $row['SoftwareLanguage'] ,
                    'inputTypeofTestingTechnique'       => $row['TypeofTestingTechnique'] ,
                    'inputTestingLevel'                 => $row['TestingLevel'] ,
                    'inputTestCaseGenerationCriteria'   => $row['TestCaseGenerationCriteria'] ,
                    'inputInputsRequired'               => $row['InputsRequired'] ,
                    'inputResultsGenerated'             => $row['ResultsGenerated'] ,
                    'inputFailuresRevealed'             => $row['FailuresRevealed'] ,
                    'inputQualityAttributes'            => $row['QualityAttributes'] ,
                    'inputConcurrentBugPattern'         => $row['ConcurrentBugPattern'] ,
                    'inputGraphicalRepresentation'      => $row['GraphicalRepresentation'] ,
                    'inputTypeofanalysis'               => $row['Typeofanalysis'] ,
                    'inputParadigm'                     => $row['Paradigm'] ,
                    'inputMechanismOfReplay'            => $row['MechanismOfReplay'] ,
                    'inputInstrumentation'              => $row['Instrumentation'] ,
                    'inputStateSpace'                   => $row['StateSpace'] ,
                    'inputTool'                         => $row['Tool'] ,
                    'inputToolRefCatalog'               => $row['ToolRefCatalog'] ,
                    'inputAutomationLevel'              => $row['AutomationLevel'] ,
                    'inputPlatformOperation'            => $row['PlatformOperation'] ,
                    'inputToolCost'                     => $row['ToolCost']
                );


        return $buildField;
    }


    function buildFields () {
        $field = array( 'BibliograficReference' ,
                        'DevelopmentParadigm' ,
                        'SoftwareExecutionPlatform' ,
                        'SoftwareLanguage' ,
                        'TypeofTestingTechnique' ,
                        'TestingLevel' ,
                        'TestCaseGenerationCriteria' ,
                        'InputsRequired' ,
                        'ResultsGenerated' ,
                        'FailuresRevealed' ,
                        'QualityAttributes' ,
                        'ConcurrentBugPattern' ,
                        'GraphicalRepresentation' ,
                        'Typeofanalysis' ,
                        'Paradigm' ,
                        'MechanismOfReplay' ,
                        'Instrumentation' ,
                        'StateSpace' ,
                        'Tool' ,
                        'ToolRefCatalog' ,
                        'AutomationLevel' ,
                        'PlatformOperation' ,
                        'ToolCost' );
        return $field;
    }

    function buildId () {
        $id = array(    'inputBibliograficReference' ,
                        'inputDevelopmentParadigm' ,
                        'inputSoftwareExecutionPlatform' ,
                        'inputSoftwareLanguage' ,
                        'inputTypeofTestingTechnique' ,
                        'inputTestingLevel' ,
                        'inputTestCaseGenerationCriteria' ,
                        'inputInputsRequired' ,
                        'inputResultsGenerated' ,
                        'inputFailuresRevealed' ,
                        'inputQualityAttributes' ,
                        'inputConcurrentBugPattern' ,
                        'inputGraphicalRepresentation' ,
                        'inputTypeofanalysis' ,
                        'inputParadigm' ,
                        'inputMechanismOfReplay' ,
                        'inputInstrumentation' ,
                        'inputStateSpace' ,
                        'inputTool' ,
                        'inputToolRefCatalog' ,
                        'inputAutomationLevel' ,
                        'inputPlatformOperation' ,
                        'inputToolCost' );
        return $id;
    }

    function buildName () {
        $name = array ( 'Bibliografic Reference' ,
                        'Development Paradigm' ,
                        'Software Execution Platform' ,
                        'Software Language' ,
                        'Type of Testing Technique - Family' ,
                        'Testing Level' ,
                        'Test Case Generation Criteria' ,
                        'Inputs Required' ,
                        'Results generated/Response variable' ,
                        'Failures Revealed' ,
                        'Quality Attributes' ,
                        'Concurrent Bug Pattern' ,
                        'Representation of concurrent program/Graphical representation' ,
                        'Type of Analysis' ,
                        'Paradigm for process interaction' ,
                        'Mechanism of Replay/Non-deterministic/Deterministic-execution' ,
                        'Instrumentation' ,
                        'State space explosion problem' ,
                        'Tool' ,
                        'Tool Ref Catalog' ,
                        'Automation Level' ,
                        'Platform that the tool operates' ,
                        'Tool Cost' );
        return $name;
    }
}
?>