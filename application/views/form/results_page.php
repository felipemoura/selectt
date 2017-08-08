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
</style>


<? if (isset($info) && isset($result)) : ?>
<div class="container animated fadeIn">

	<h1>Results Page</h1>

	<h3 align="center">Results from <?= $info['title']; ?></h3>

	<?php foreach ($result as $technique) : ?>
		<? $resultWeight = $technique['result_weight'] * 100; ?>

		<? if ($resultWeight > 75.00) : ?>
			<div class="panel panel-success">
		<? elseif ($resultWeight > 50.00) : ?>
			<div class="panel panel-info">
		<? elseif ($resultWeight > 25.00) : ?>
			<div class="panel panel-warning">
		<? else : ?>
			<div class="panel panel-danger">
		<? endif; ?>
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

				<div class="panel-body">
					<?php foreach ($technique as $keyTechnique => $field) : ?>
						<? if ( (strcmp ($keyTechnique, "id") == 0) || (strcmp ($keyTechnique, "result_weight") == 0) ) : ?>
							<? continue; ?>
						<? endif; ?>


						<div class="form-group">
							<? if (strcmp($keyTechnique, "title") != 0): ?>
							<label style="font-size: 10pt;"><?= $field['atribute']; ?> 
								attribute
							<? endif; ?>
							</label>
	
							<? if (strcmp ($keyTechnique, "title") == 0) : ?>
								<label>Technique Title for comparison</label>
								<p class="form-control-static"><?= $field; ?></p></div>
								<? continue; ?>
							<? endif; ?>

							<table style="align-content: center; align-self: center; width:50%" border="1">
								<tr>
									<th style="width: 50%">Compare</th>
									<th style="width: 50%">Input on form</th>
								</tr>
								
								<?php foreach ($field as $key => $single) : ?>
								
									<? if ( (strcmp($key, "max_value") == 0) || (strcmp($key, "atribute") == 0)) continue; ?>

									<tr <?= $single['weight'] === $single['result'] ? "style='background-color: 	#90ee90;'" : ""; ?>>
											<td><?= $single['baseValue'];?></td>
											<td><?= $single['compareValue'];?></td>
									</tr>
								<? endforeach; ?>
							</table>

						</div>
					<? endforeach; ?>
				</div>
			</div>
	
	<? endforeach; ?>

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

</script>

</body>
</html>