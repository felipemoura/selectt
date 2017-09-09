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
	<img class="img-responsive center-block" alt="HomeImage" style="max-width: 548px; max-height: 190px; padding-top: 30px;" src="<? echo base_url("assets/photos/selectt.png");?>" >

	<div class="container center-block">
		<? if (isset($home['TEXT'])): ?>
			<?= $home['TEXT']; ?>
		<? endif; ?>

		<div class="row" style="padding-top: 20px;">
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<div class="jumbotron" align="center">
					<i class="fa fa-balance-scale fa-5x" aria-hidden="true"></i>
					<h4>How to get your objectives using our tool.</h4>
					<a class="btn btn-primary btn-block" href="<?= base_url('information/about'); ?>">About</a>
				</div>
			</div>

			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<div class="jumbotron" align="center">
					<i class="fa fa-bar-chart fa-5x" aria-hidden="true"></i>
					<h4>Get more knowledge about concurrent testing area.</h4>
					<a class="btn btn-primary btn-block" href="<?= base_url('content/statistics'); ?>">Statistics</a>
				</div>
			</div>

			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<div class="jumbotron" align="center">
					<i class="glyphicon glyphicon-piggy-bank" aria-hidden="true" style="font-size: 5em;"></i>
					<h4>SelecTT is free and can help to reduces your project costs</h4>
					<a class="btn btn-primary btn-block" href="<?= base_url('contact'); ?>">Cost</a>
				</div>
			</div>

			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<div class="jumbotron" align="center">
					<i class="fa fa-puzzle-piece fa-5x" aria-hidden="true"></i>
					<h4>SelecTT is free and can help to reduces your project costs</h4>
					<a class="btn btn-primary btn-block" href="<?= base_url('contact'); ?>">Contribute</a>
				</div>
			</div>
		</div>

	</div>
</div>

<!-- START OF FOOTER -->
<?	$this->load->view('templates/footer'); ?>
<!-- END OF FOOTER  -->

<script type="text/javascript">
	$('ul.nav li.dropdown').hover(function() {
		$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
	}, function() {
		$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
	});	
</script>

</body>
</html>