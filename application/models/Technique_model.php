<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Technique_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    // Get all techniques for admin page
    function getAllTechniques ()
    {
      $query = $this->db->select('*')->from('Technique')->get();
      $count = 0;
      $data = null;

      foreach ($query->result() as $row) {    
        $data['info'][$count++] = array ( 
          'id'                              => $row->id,
          'title'                           => $row->title,
          'year'                            => $row->year,
          'needApproval'                    => $row->needApproval,
          'insertedBy'                      => $row->insertedBy,
          'insertedOn'                      => $row->insertedOn
          );
      }

      return $data;  
    }

    // delete technique, only on admin page
    function deleteTechnique ($id) 
    {
      $this->db->delete('Technique', array('id' =>  $id));
    }

    // aprove inserted technique, only on admin page
    function approveTechnique ($id) 
    {
      $data = array( 'needApproval' => 0 );
      $this->db->where('id', $id)->update('Technique', $data); 
    }

    // UPDATE all info into technique table
    function updateTechnique($data, $id)
    {
      $this->db->where('id', $id)->update('Technique', $data);

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
  
    // INSERT all info into technique table
    function insertTechnique ($data) 
    {
      $this->db->insert('Technique', $data);

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

    function deleteAllTechniqueAtributes ($tableName, $id)
    {
      $this->db->delete($tableName, array('idTechnique' =>  $id));
    }

    // INSERT all info (atributes) of a technique into atributes tables
    function insertTechniqueAtributes ($tableName, $data)
    {
      $this->db->insert($tableName, $data);

        if ($this->db->affected_rows() != 1) {
            $error = $this->db->error();

            if ($error['code'] == 1062) {
                return "Sorry but this atribute is already in database!";
            } else {
                return "Unknown error, please contact the administrator !";
            }

        } else {
            return TRUE;
        }
    }

    // Get fields to iterate
    function getTablesTechnique ()
    {
      // return all the tables with respective field
      return $techniqueTables = array( 
        "ExecutionPlatform"         => "executionPlatform",
        "Objective"                 => "objective",
        "ProgrammingLanguage"       => "programmingLanguage",
        "TestingTechnique"          => "testingTechnique",
        "TestDataGeneration"        => "testDataGeneration",
        "TestingLevel"              => "testingLevel",
        "SynchronizationMechanism"  => "synchronizationMechanism",
        "Input"                     => "input",
        "Output"                    => "output",
        "QualityAttribute"          => "qualityAttribute",
        "TypeOfStudy"               => "typeOfStudy",
        "TestingAnalysis"           => "testingAnalysis",
        "ConcurrentParadigm"        => "concurrentParadigm",
        "ReplayMechanism"           => "replayMechanism",
        "ProgramRepresentation"     => "programRepresentation",
        "Instrumentation"           => "instrumentation",
        "StateSpaceReduction"       => "stateSpaceReduction",
        "ConcurrentBugs"            => "concurrentBugs",
        "ToolName"                  => "toolName",
        "Cost"                      => "cost",
        "PlatformTool"              => "platformTool"
      );
    }  

    // build all info from one technique
    function buildTechnique ($id)
    {
      $technique = null;
      $query = null;

      $query = $this->db->select('*')->from('Technique')->where('id', $id)->limit(1)->get();

      if ($query->num_rows() === 1) 
      {
        // initialize the array with all the info
        $technique = array ();

        // get al technique info in the first table
        $technique = $query->row_array();

        // Get tables info
        $techniqueTables = $this->getTablesTechnique();

        // lopp through the tables
        foreach ($techniqueTables as $key => $value) {

          $tempResult = $this->db->select($value)->from($key)->where('idTechnique', $id)->get();
          
          $count = 0;
          foreach ($tempResult->result() as $row) {
              $technique[$key][$count++] = $row->$value;
          }
        }

        return $technique;
      } 
      
      else 
      {
        return null;
      }
    }

    // Build the whole database into one array
    function buildTechniques ()
    {
      $techniques = null;
      $query = null;

      $query = $this->db->select('id')->from('Technique')->get();

      if ($query->num_rows() > 0) 
      {
        // initialize the array with all the info
        $techniques = array ();

        $count = 0;
        foreach ($query->result() as $row) {
          $techniques[$count++] = $this->buildTechnique($row->id);
        }

        return $techniques;
      } 
      
      else 
      {
        return null;
      } 
    }

    function singleTableInfo ($tableName)
    {
      $tableInfo = null;
      $query = null;

      if (strlen($tableName) <= 0) { return null; }

      $fieldName = lcfirst($tableName);

      // Get info table distinct !!!
      $query = $this->db->select($fieldName)->distinct()->from($tableName)->get();

      if ($query->num_rows() > 0) 
      {
        // initialize the array with all the info
        $tableInfo = array ();

        $count = 0;
        foreach ($query->result() as $row) {
          $tableInfo[$count++] = $row->$fieldName;
        }
        // $tableInfo[$count] = 'No Information';

        return $tableInfo;
      } 
      
      else 
      {
        return null;
      }       
    }

    // Build the whole database tables into one array
    function tablesInfo ()
    {
      $tableInfo = null;
      $tables = $this->getTablesTechnique();

      if (isset($tables)) 
      {
        // initialize the array with all the info
        $tableInfo = array ();

        foreach ($tables as $key => $value) {
          $query = $this->db->select($value)->distinct()->from($key)->get();
          $count = 0;
          foreach ($query->result() as $row) {
            $tableInfo[$value][$count++] = $row->$value;
          }

          // $tableInfo[$value][$count] = 'No Information';

        }

        return $tableInfo;
      } 
      else 
      {
        return null;
      } 
    }
}
?>
