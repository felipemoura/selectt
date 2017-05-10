<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container animated fadeInDown">

  <?php echo $error;?>

  <?php echo form_open_multipart('Insert_test/do_upload');?>

  <!-- Title -->
  <div class="form-group">
    <label for="inputTitle">Title:</label>
    <input type="text" class="form-control" id="inputTitle" aria-describedby="titleHelp" placeholder="Enter project Title" required focus>
  </div>

  <!-- Year -->
  <div class="form-group">
    <label for="inputYear">Select year of publication:</label>
    <select class="form-control" id="inputYear">
    	<!-- JS of years here -->
    </select>
  </div>

  <!-- Bibliografic Reference -->
  <div class="form-group">
    <label for="inputBibliograficReference">Bibliografic Reference</label>
    <textarea class="form-control" id="inputBibliograficReference" rows="5"></textarea>
  </div>

  <!-- PDF file -->
  <div class="form-group">
    <label for="inputArticlePDF">Paper PDF file</label>
    <input type="file" class="form-control-file" id="inputArticlePDF" aria-describedby="fileHelp">
    <small id="fileHelp" class="form-text text-muted">Max file size, 2 MB</small>
  </div>


  <!-- Development paradigm   -->
  <div class="form-group">
    <label for="inputDevelopmentParadigm">Development Paradigm</label>
    <textarea class="form-control" id="inputDevelopmentParadigm" rows="5"></textarea>
  </div>

  <!--  Software Execution Platform  -->
  <div class="form-group">
    <label for="inputSoftwareExecutionPlatform">Software Execution Platform</label>
    <textarea class="form-control" id="inputSoftwareExecutionPlatform" rows="5"></textarea>
  </div>

  <!--  Software Language	  -->
  <div class="form-group">
    <label for="inputSoftwareLanguage">Software Language</label>
    <textarea class="form-control" id="inputSoftwareLanguage" rows="5"></textarea>
  </div>

  <!--  Type of Testing technique - Family	  -->
  <div class="form-group">
    <label for="inputTypeofTestingTechnique">Type of Testing technique - Family</label>
    <textarea class="form-control" id="inputTypeofTestingTechnique" rows="5"></textarea>
  </div>

  <!--  Testing level  -->
  <div class="form-group">
    <label for="inputTestingLevel">Testing level</label>
    <textarea class="form-control" id="inputTestingLevel" rows="5"></textarea>
  </div>

  <!--  Approach  -->
  <div class="form-group">
    <label for="inputApproach">Approach (Technique name)</label>
    <textarea class="form-control" id="inputApproach" rows="5"></textarea>
  </div>

  <!--  Test case generation criteria  -->
  <div class="form-group">
    <label for="inputTestCaseGenerationCriteria">Test case generation criteria</label>
    <textarea class="form-control" id="inputTestCaseGenerationCriteria" rows="5"></textarea>
  </div>

  <!--  Inputs required	  -->
  <div class="form-group">
    <label for="inputInputsRequired">Inputs required</label>
    <textarea class="form-control" id="inputInputsRequired" rows="5"></textarea>
  </div>

  <!--  Results generated/Response variable  -->
  <div class="form-group">
    <label for="inputResultsGenerated">Results generated/Response variable</label>
    <textarea class="form-control" id="inputResultsGenerated" rows="5"></textarea>
  </div>

  <!--  Failures revealed  -->
  <div class="form-group">
    <label for="inputFailuresRevealed">Failures revealed</label>
    <textarea class="form-control" id="inputFailuresRevealed" rows="5"></textarea>
  </div>

  <!--   Quality attributes	 -->
  <div class="form-group">
    <label for="inputQualityAttributes"></label>
    <textarea class="form-control" id="inputQualityAttributes" rows="5"></textarea>
  </div>

  <!--  Concurrent bug pattern  -->
  <div class="form-group">
    <label for="inputConcurrentBugPattern">Concurrent bug pattern</label>
    <textarea class="form-control" id="inputConcurrentBugPattern" rows="5"></textarea>
  </div>

  <!--  Representation of concurrent program/Graphical representation  -->
  <div class="form-group">
    <label for="inputGraphicalRepresentation">Representation of concurrent program/Graphical representation</label>
    <textarea class="form-control" id="inputGraphicalRepresentation" rows="5"></textarea>
  </div>

  <!--  Type of analysis  -->
  <div class="form-group">
    <label for="inputTypeofanalysis">Type of analysis</label>
    <textarea class="form-control" id="inputTypeofanalysis" rows="5"></textarea>
  </div>


  <!--  Paradigm for process interaction  -->
  <div class="form-group">
    <label for="inputParadigm">Paradigm for process interaction</label>
    <textarea class="form-control" id="inputParadigm" rows="5"></textarea>
  </div>

  <!--   Mechanism of Replay/Non-deterministic/Deterministic-execution  -->
  <div class="form-group">
    <label for="inputMechanismOfReplay">Mechanism of Replay/Non-deterministic/Deterministic-execution</label>
    <textarea class="form-control" id="inputMechanismofReplay" rows="5"></textarea>
  </div>

  <!--  Instrumentation	  -->
  <div class="form-group">
    <label for="inputInstrumentation">Instrumentation</label>
    <textarea class="form-control" id="inputInstrumentation" rows="5"></textarea>
  </div>

  <!--  State space explosion problem  -->
  <div class="form-group">
    <label for="inputStateSpace">State space explosion problem</label>
    <textarea class="form-control" id="inputStateSpace" rows="5"></textarea>
  </div>
  
  <!--  Tool  -->
  <div class="form-group">
    <label for="inputTool">Tool</label>
    <textarea class="form-control" id="inputTool" rows="5"></textarea>
  </div>

  <!--  Tool Ref Catalog  -->
  <div class="form-group">
    <label for="inputToolRefCatalog">Tool Ref Catalog</label>
    <textarea class="form-control" id="inputToolRefCatalog" rows="5"></textarea>
  </div>

  <!--  Automation level  -->
  <div class="form-group">
    <label for="inputAutomationLevel">Automation level</label>
    <textarea class="form-control" id="inputAutomationLevel" rows="5"></textarea>
  </div>

  <!--  Platform that the tool operate  -->
  <div class="form-group">
    <label for="inputPlatformOperation">Platform that the tool operate</label>
    <textarea class="form-control" id="inputPlatformOperation" rows="5"></textarea>
  </div>

  <!--  Tool Cost  -->
  <div class="form-group">
    <label for="inputToolCost">Tool Cost</label>
    <textarea class="form-control" id="inputToolCost" rows="5"></textarea>
  </div>

  <!-- Submit Form -->
  <button type="submit" class="btn btn-block btn-success">Insert Technique into Database</button>

</div>