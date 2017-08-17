<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<? $this->load->view('templates/header_logged'); ?>

<style type="text/css">
	.clickable
	{
		cursor: pointer;
	}

	.clickable .glyphicon
	{
		background: rgba(0, 0, 0, 0.1);
		display: inline-block;
		padding: 6px 12px;
		border-radius: 4px;

		border-style: solid;
	}

	.panel-heading span
	{
		margin-top: -7px;
		font-size: 15px;
		/*margin-right: -9px;*/
	}

	a.clickable { color: inherit; }
	a.clickable:hover { text-decoration:none; }

	table {
		align-content: center; 
		align-self: center; 
		font-size: 16pt;
		margin: 1em;
		width: 80%;
	}

	tr th {
		background-color: #FAF9FF;
		font-size: 24pt;
		text-align: center;
	}

	tr td {
		background-color: #BDCEFA;
	}

	.glyphicon-ok{
		color: green;
	}

	.glyphicon-remove{
		color: red;
	}
</style>


<? if (isset($info) && isset($result)) : ?>
<div class="container animated fadeIn">

	<h1>Results Page</h1>

	<h3 align="center">Results from <?= $info['title']; ?></h3>

	<? $count = 0; ?>
	<?php foreach ($result as $technique) : ?>
		<? $resultWeight = $technique['result_weight'] * 100; ?>

		<? if ($resultWeight > 75.00) : ?>
			<div class="panel panel-success" <?= ($count >= 5) ? "hidden" : "" ?>>
		<? elseif ($resultWeight > 50.00) : ?>
			<div class="panel panel-info" <?= ($count >= 5) ? "hidden" : "" ?>>
		<? elseif ($resultWeight > 25.00) : ?>
			<div class="panel panel-warning" <?= ($count >= 5) ? "hidden" : "" ?>>
		<? else : ?>
			<div class="panel panel-danger" <?= ($count >= 5) ? "hidden" : "" ?>>
		<? endif; ?>
		<? $count++; ?> 
				<div class="clickable panel-heading">
					<h3 class="panel-title">
						<?= $technique['title']; ?>
						<span class="pull-right">
							<strong>MATCH: </strong><?= $resultWeight; ?>% 
							<i class="glyphicon glyphicon-minus"></i>
						</span>
					</h3>
					<br>
					<div class="progress">
						<? if ($resultWeight > 75.00) : ?>
							<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="<?= $resultWeight; ?>"
								aria-valuemin="0" aria-valuemax="100" style="width: <?= $resultWeight; ?>%;">
								<?= $resultWeight; ?> %
							</div>
						<? elseif ($resultWeight > 50.00) : ?>
							<div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="<?= $resultWeight; ?>"
								aria-valuemin="0" aria-valuemax="100" style="width: <?= $resultWeight; ?>%;">
								<?= $resultWeight; ?> %
							</div>
						<? elseif ($resultWeight > 25.00) : ?>
							<div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="<?= $resultWeight; ?>"
								aria-valuemin="0" aria-valuemax="100" style="width: <?= $resultWeight; ?>%;">
								<?= $resultWeight; ?> %
							</div>
						<? else : ?>
							<div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="<?= $resultWeight; ?>"
								aria-valuemin="0" aria-valuemax="100" style="width: <?= $resultWeight; ?>%;">
								<?= $resultWeight; ?> %
							</div>
						<? endif; ?>
					</div>
				</div>

				<div class="panel-body" align="center">
					<table border="1">

						<?php foreach ($technique as $keyTechnique => $field) : ?>
							<? if ( (strcmp ($keyTechnique, "id") === 0) || (strcmp ($keyTechnique, "result_weight") === 0) ) : ?>
								<? continue; ?>
							<? endif; ?>


							<? if (strcmp ($keyTechnique, "title") == 0) : ?>
								<thead>
									<tr>
										<th colspan="2"><?= $field; ?></th>
									</tr>
									<tr>
										<th style="width: 50%">Atribute</th>
										<th style="width: 50%">Match ( <i class="glyphicon glyphicon-ok"></i> or <i class="glyphicon glyphicon-remove"></i> )</th>
									</tr>
								</thead>
								<? continue; ?>
							<? else: ?>
								<tbody>
									<tr>
										<td style="font-weight: 900"><?= $field['atribute']; ?></td>
										<td style="text-align:center;">
											<? if ($field['match'] === true) : ?>
												<i class="glyphicon glyphicon-ok"></i>
											<? else : ?>
												<i class="glyphicon glyphicon-remove"></i>
											<? endif; ?>
										</td>
									</tr>
								</tbody>
							<? endif; ?>


						<?php endforeach; ?>
					
					</table>
				</div>
			</div>
	
	<? endforeach; ?>

	<button id="showAll" style="margin-top: 50px; border: 1px solid #8c8b8b;" class="btn btn-block btn-primary">View all Results</button>
</div>
<? endif; ?>


<!-- START OF FOOTER -->
<? $this->load->view('templates/footer'); ?>
<!-- END OF IT  -->

<script type="text/javascript">
	$(document).on('click', '.panel-heading span.clickable', function (e) {
		var $this = $(this);
		if (!$this.hasClass('panel-collapsed')) {
			$this.parents('.panel').find('.panel-body').slideUp();
			$this.addClass('panel-collapsed');
			$this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
		} else {
			$this.parents('.panel').find('.panel-body').slideDown();
			$this.removeClass('panel-collapsed');
			$this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
		}
	});
	$(document).on('click', '.panel div.clickable', function (e) {
		var $this = $(this);
		if (!$this.hasClass('panel-collapsed')) {
			$this.parents('.panel').find('.panel-body').slideUp();
			$this.addClass('panel-collapsed');
			$this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
		} else {
			$this.parents('.panel').find('.panel-body').slideDown();
			$this.removeClass('panel-collapsed');
			$this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
		}
	});
	$(document).ready(function () {
		$('.panel-heading span.clickable').click();
		$('.panel div.clickable').click();
	});

	$("#showAll").click(function() {
	  document.getElementById(this.id).style.visibility = "hidden";
	  $('.panel').show().fadeIn('slow');
	});

</script>

</body>
</html>