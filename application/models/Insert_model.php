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
    

    function buildId () {
        $id = array(   'inputBibliograficReference' ,
                        'inputDevelopmentParadigm' ,
                        'inputSoftwareExecutionPlatform' ,
                        'inputSoftwareLanguage' ,
                        'inputTypeofTestingTechnique' ,
                        'inputTestingLevel' ,
                        //'inputApproach' ,
                        'inputTestCaseGenerationCriteria' ,
                        'inputInputsRequired' ,
                        'inputResultsGenerated' ,
                        'inputFailuresRevealed' ,
                        'inputQualityAttributes' ,
                        'inputConcurrentBugPattern' ,
                        'inputGraphicalRepresentation' ,
                        'inputTypeofanalysis' ,
                        'inputParadigm' ,
                        'inputMechanismofReplay' ,
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
                        //'Approach (Technique name)' ,
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