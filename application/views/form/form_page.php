<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<? $this->load->view('templates/header_logged'); ?>

<style type="text/css">
	.form-group {
		margin-top: 4em;
		margin-bottom: 4em;
	}	
</style>

<div class="container animated fadeIn">
  <h1>Form Page</h1>

  <h5>Here you insert information about your project.</h5>

  <?php echo form_open(base_url('form/getResults'));?>

  <?php echo $this->session->flashdata('msg'); ?> 

  <!-- Software Execution Platform -->
  <div class="form-group">
	<legend>Software execution platform</legend>
	<div class="row">
		
		<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    		<input class="form-check-input" type="radio" name="input_1" value="1"> Windows
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_1" value="2"> Linux
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_1" value="3"> MacOS
	      </label>
	    </div>

	    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-check">
	      <label class="pull-right form-check-label">
	    	<input class="form-check-input" type="radio" name="input_1" value="0" checked> None
	      </label>
	    </div>
    </div>
  </div>


  <!-- Development paradigm adopted at the project -->
  <div class="form-group">
	<legend>Development Paradigm Adopted at the Project</legend>
	<div class="row">
		
		<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    		<input class="form-check-input" type="radio" name="input_2" value="1"> Concurrent
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_2" value="2"> Parallel
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_2" value="3"> Distributed
	      </label>
	    </div>


	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_2" value="4"> Multithreading
	      </label>
	    </div>

	    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 form-check">
	      <label class="pull-right form-check-label">
	    	<input class="form-check-input" type="radio" name="input_2" value="0" checked> None
	      </label>
	    </div>
    </div>
  </div>


  <!-- Programming language  -->
  <div class="form-group">
	<legend>Programming Language</legend>
	<div class="row">
		
		<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    		<input class="form-check-input" type="radio" name="input_3" value="1"> Java
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_3" value="2"> C
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_3" value="3"> C++
	      </label>
	    </div>


	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_3" value="4"> Pthreads
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_3" value="5"> MPI
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="pull-right form-check-label">
	    	<input class="form-check-input" type="radio" name="input_3" value="0" checked> None
	      </label>
	    </div>
    </div>
  </div>


  <!-- Concurrent paradigm -->
  <div class="form-group">
	<legend>Concurrent Paradigm</legend>
	<div class="row">
		
		<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    		<input class="form-check-input" type="radio" name="input_4" value="1"> Shared memory
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_4" value="2"> Message passing
	      </label>
	    </div>

	    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 form-check">
	      <label class="pull-right form-check-label">
	    	<input class="form-check-input" type="radio" name="input_4" value="0" checked> None
	      </label>
	    </div>
    </div>
  </div>


  <!-- Concurrent bugs revealed -->
  <div class="form-group">
	<legend>Concurrent Bugs Revealed</legend>
	<div class="row">
		
		<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    		<input class="form-check-input" type="radio" name="input_5" value="1"> Data Race
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_5" value="2"> Deadlock
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_5" value="3"> Atomicity violation
	      </label>
	    </div>

	    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-check">
	      <label class="pull-right form-check-label">
	    	<input class="form-check-input" type="radio" name="input_5" value="0" checked> None
	      </label>
	    </div>
    </div>
  </div>


  <!-- Testing Level -->
  <div class="form-group">
	<legend>Testing Level</legend>
	<div class="row">
		
		<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    		<input class="form-check-input" type="radio" name="input_6" value="1"> Unit
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_6" value="2"> Integration
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_6" value="3"> System
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_6" value="4"> Regression
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_6" value="5"> Acceptance
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="pull-right form-check-label">
	    	<input class="form-check-input" type="radio" name="input_6" value="0" checked> None
	      </label>
	    </div>
    </div>
  </div>


  <!-- Test Input -->
  <div class="form-group">
	<legend>Test Input</legend>
	<div class="row">
		
		<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    		<input class="form-check-input" type="radio" name="input_7" value="1"> Source code
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_7" value="2"> Model
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_7" value="3"> Requirements
	      </label>
	    </div>

	    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-check">
	      <label class="pull-right form-check-label">
	    	<input class="form-check-input" type="radio" name="input_7" value="0" checked> None
	      </label>
	    </div>
    </div>
  </div>


  <!-- Test Output -->
  <div class="form-group">
	<legend>Test Output</legend>
	<div class="row">
		
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    		<input class="form-check-input" type="radio" name="input_8" value="1"> Number of faults detected
	      </label>
	    </div>

	    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_8" value="2"> Code coverage
	      </label>
	    </div>

	    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 form-check">
	      <label class="pull-right form-check-label">
	    	<input class="form-check-input" type="radio" name="input_8" value="0" checked> None
	      </label>
	    </div>
    </div>
  </div>


  <!-- Type of testing technique to be applied -->
  <div class="form-group">
	<legend>Type of Testing Technique to be Applied</legend>
	<div class="row">
		
		<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    		<input class="form-check-input" type="radio" name="input_9" value="1"> Search based
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_9" value="2"> Structural
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_9" value="3"> Mutation
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_9" value="4"> Regression
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_9" value="5"> Reachability
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="pull-right form-check-label">
	    	<input class="form-check-input" type="radio" name="input_9" value="0" checked> None
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_9" value="6"> Deterministic
	      </label>
	    </div>
	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_9" value="7"> Random
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_9" value="8"> Formal
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_9" value="9"> Model based
	      </label>
	    </div>
    </div>
  </div>

  <!-- Type of testing analysis  -->
  <div class="form-group">
	<legend>Type of Testing Analysis</legend>
	<div class="row">
		
		<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    		<input class="form-check-input" type="radio" name="input_10" value="1"> Static
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_10" value="2"> Dynamic
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_10" value="3"> Both
	      </label>
	    </div>

	    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-check">
	      <label class="pull-right form-check-label">
	    	<input class="form-check-input" type="radio" name="input_10" value="0" checked> None
	      </label>
	    </div>
    </div>
  </div>



  <!-- Quality attribues that need to be evaluated during the project -->
  <div class="form-group">
	<legend>Quality Attribues that need to be Evaluated During the Project</legend>
	<div class="row">
		
		<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    		<input class="form-check-input" type="radio" name="input_11" value="1"> Effectiveness
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_11" value="2"> Efficience
	      </label>
	    </div>

	   	<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_11" value="3"> Performance
	      </label>
	    </div>

	    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-check">
	      <label class="pull-right form-check-label">
	    	<input class="form-check-input" type="radio" name="input_11" value="0" checked> None
	      </label>
	    </div>
    </div>
  </div>


   <!-- Tool support required -->
  <div class="form-group">
	<legend>Tool Support Required</legend>
	<div class="row">
		
		<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    		<input class="form-check-input" type="radio" name="input_12" value="1"> Yes
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_12" value="2"> No
	      </label>
	    </div>

	    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 form-check">
	      <label class="pull-right form-check-label">
	    	<input class="form-check-input" type="radio" name="input_12" value="0" checked> None
	      </label>
	    </div>
    </div>
  </div>  


  <!-- Platform of development -->
  <div class="form-group">
	<legend>Platform of Development</legend>
	<div class="row">
		
		<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    		<input class="form-check-input" type="radio" name="input_13" value="1"> Windows
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_13" value="2"> Linux
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_13" value="3"> MacOS
	      </label>
	    </div>

	    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-check">
	      <label class="pull-right form-check-label">
	    	<input class="form-check-input" type="radio" name="input_13" value="0" checked> None
	      </label>
	    </div>
    </div>
  </div>  


  <!-- Level of technique evaluation -->
  <div class="form-group">
	<legend>Level of Technique Evaluation</legend>
	<div class="row">
		
		<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    		<input class="form-check-input" type="radio" name="input_14" value="1"> Case study
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_14" value="2"> Quase-experiment
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_14" value="3"> Controlled experiment
	      </label>
	    </div>

	    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-check">
	      <label class="pull-right form-check-label">
	    	<input class="form-check-input" type="radio" name="input_14" value="0" checked> None
	      </label>
	    </div>
    </div>
  </div>  


  <!-- Cost required to testing -->
  <div class="form-group">
	<legend>Cost Required to Testing</legend>
	<div class="row">
		
		<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    		<input class="form-check-input" type="radio" name="input_15" value="1"> Freeware
	      </label>
	    </div>

	    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-check">
	      <label class="form-check-label">
	    	<input class="form-check-input" type="radio" name="input_15" value="2"> Shareware
	      </label>
	    </div>

	    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 form-check">
	      <label class="pull-right form-check-label">
	    	<input class="form-check-input" type="radio" name="input_15" value="0" checked> None
	      </label>
	    </div>
    </div>
  </div>  

    <!-- Submit Form -->
  <button type="submit" class="btn btn-block btn-primary">Check Results !</button>
<!-- End container -->
</div>

<!-- START OF FOOTER -->
<? $this->load->view('templates/footer'); ?>
<!-- END OF IT  -->

</body>
</html>