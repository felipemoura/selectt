<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- START OF HEADER -->
<? $this->load->view('templates/header'); ?>
<!-- END OF HEADER -->

<style type="text/css">
	.container .center-block {
		font-size: 12pt;
		margin: auto;
		max-width: 1200px;
		padding-top: 30px;
		padding-bottom: 15px;
	}

	.jumbotron {
		min-height: 250px;
	}

	.jumbotron h4 {
		font-size: 10pt;
	}
</style>

<div class="container animated fadeIn">
	<div class="container center-block">
		<h1>User manual</h1>

		<h3>How to use <strong>Sellect</strong></h3>
		<br>
		<p align="justify">First, you need to <a href="<?= base_url('login')?>">log in</a> on the top left, or <a href="<?= base_url('register')?>">register</a> on the same spot. After logged in you can use one of the three options described below.</p>
		<br>
		<br>
		<p align="justify">
			<ul style="font-size: 1em">
				<li style="margin-top: 10px;"><strong>1 - Insert:</strong> Technique -> Insert new Technique </li>
				<img class="img-responsive center-block" alt="insert" style="max-width: 548px; max-height: 190px; padding-top: 30px;" src="<? echo base_url("assets/photos/insert.png");?>" >
				<img class="img-responsive center-block" alt="insert2" style="max-width: 700px; max-height: 490px; padding-top: 30px;" src="<? echo base_url("assets/photos/insert2.png");?>" >

				<li style="margin-top: 10px;"><strong>2 - Selection:</strong> Technique -> Software Project Information.</li>
				<img class="img-responsive center-block" alt="information" style="max-width: 548px; max-height: 190px; padding-top: 30px;" src="<? echo base_url("assets/photos/information.png");?>" >			

				<img class="img-responsive center-block" alt="information2" style="max-width: 700px; max-height: 490px; padding-top: 30px;" src="<? echo base_url("assets/photos/information2.png");?>" >

				<li style="margin-top: 10px;"><strong>3 - Results:</strong> Technique -> Results</li>
				<img class="img-responsive center-block" alt="results" style="max-width: 548px; max-height: 190px; padding-top: 30px;" src="<? echo base_url("assets/photos/results.png");?>" >

				<img class="img-responsive center-block" alt="results2" style="max-width: 700px; max-height: 490px; padding-top: 30px;" src="<? echo base_url("assets/photos/results2.png");?>" >
			</ul>
		</p>		
	</div>
</div>

<!-- START OF FOOTER -->
<?	$this->load->view('templates/footer'); ?>
<!-- END OF FOOTER  -->
</body>
</html>