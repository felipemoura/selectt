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
        $this->db->insert('caracterization', $data);

        if ($this->db->affected_rows() != 1) {
            $error = $this->db->error();

            if ($error['code'] == 1062) {
                return "Sorry but this technique is already in database!";
            } else {
                return "Unknown error, please contact the administrator !";
            }

        } else {
            return TRUE;
        }
    }

    function buildFields () {
        $field = array( 'TechniqueLink' ,                        
                        'BibliograficReference' ,
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
        $id = array(    'inputTechniqueLink' ,
                        'inputBibliograficReference' ,
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
        $name = array ( 'Link to Technique',
                        'Bibliografic Reference' ,
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