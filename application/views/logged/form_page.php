<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<div class="container animated fadeInDown">
  <h1>Form Page</h1>

	<form role="form" method="post" action="<?= base_url('form/checkInsert') ?>">


		<? if (isset($error)): ?>
			<div class="alert alert-danger" role="alert" style="margin-top: 10px;"><?= $error; ?></div>
		<? endif; ?>



		  <div class="row">
				<div class="col-lg-10">
				 
				  <!-- Development paradigm   -->
				  <div class="form-group">
				    <label for="inputDevelopmentParadigm">Development Paradigm</label>
				    <textarea class="form-control" name="inputDevelopmentParadigm" id="inputDevelopmentParadigm" rows="5"></textarea>
				  </div>

	  			</div>

				<div class="col-lg-2">
				  <div class="form-check" style="margin: auto;  padding: 30px 0; text-align: center;">
				    <label class="form-check-label">
				      <input type="checkbox" name="isexample" id="isexample" class="form-check-input" onchange="toggleCheckbox(this)" value="1">
				      No information
				    </label>
				  </div>
	  	  		</div>

			</div>	

			<input type="checkbox" name="businessType[]" value="1">
			<input type="checkbox" name="businessType[]" value="2">
			<input type="checkbox" name="businessType[]" value="3">

			<button class="btn btn-success btn-block" id="btnLogin" type="submit">Insert it</button>

	</form>	
</div>


<script type="text/javascript">
		function toggleCheckbox(el)
		{
			if(el.checked){
			   $("#inputDevelopmentParadigm").prop('disabled', true);//.addClass("disabled");
			}else{
			   $("#inputDevelopmentParadigm").prop('disabled', false);//.removeClass("disabled");;
			}
		
		}
	</script>
