<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<? $this->load->view('templates/header'); ?>

<style type="text/css">
	.clickable
	{
		cursor: pointer;
	}

	/* unvisited link */
	a:link {
		color: blue;
	}

	/* visited link */
	a:visited {
		color: green;
	}

	/* mouse over link */
	a:hover {
		color: hotpink;
	}

	/* selected link */
	a:active {
		color: blue;
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

	.box {
		margin: 5px;
		height: 25px;
		display: inline-block;
		padding-top: 10px;
		width: 25px;
	}
 
	.panel-default {
		font-size: 10pt;
		/*max-width: 500px;*/
		min-width: 500px;
		min-height: 100px;
		max-height: 200px;
	}

	.panel-body {
		font-size: 10pt;
	}
</style>


<? if (isset($info) && isset($result)) : ?>
<div class="container animated fadeIn">

	<h1>Results Page</h1>
	<br>
	<br>
	<? 
		$ci =&get_instance();
		$ci->load->model('Result_model', 'result');
		$userResults = $ci->result->getUserResults($this->session->userdata("username"));  	
	?>


	<?	if (count($userResults) > 0) : ?>
		<div class="panel panel-default" style="overflow-y: scroll; height: 200px">
			<div class="panel-heading">Results History</div>
				<div class="mid-width wrapItems" style="height:<?= count($userResults)  * 40 ?>px">
					<ul>
						<? foreach ($userResults as $user) : ?>
							<li>
								<a href="<?= base_url('results/setNow/'. $user['id']); ?>">
									<?= $user['insertedOn'] ?> 
									<?= $user['title'] ?> 
								</a>
							</li>
						<? endforeach; ?>
					</ul>
				</div>
		</div>

		<? unset($userResults); ?>
	<? endif; ?> 

	<hr>
	<h3 align="center">Results from <?= $info['title']; ?></h3>

	<h3>Legend</h3>
	<!-- View button -->
	<div style="font-size: 14pt; line-height: 24px;border-style: solid; font-weight: normal;background-color: white;padding: 5px ;margin: 5px ; width: 40%">

		<p><span class="box" style="background-color: #5cb85c"></span>- Programming model</p>
		<p><span class="box" style="background-color: #5bc0de"></span> - General testing characteristics</p>
		<p><span class="box" style="background-color: #f0ad4e"></span> - Concurrent testing characteristics</p>
		<p><span class="box" style="background-color: #d9534f"></span> - Testing tool support</p>
	</div>

	<br>
	<br>
	<br>

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
					<span style="font-size: 16pt;">
					<?= $technique['testingTechnique'][0]['baseValue']; ?> - 
					<?= $technique['testDataGeneration'][0]['baseValue']; ?>
					</span>
					<span class="pull-right">
						<strong>MATCH: </strong><?= $resultWeight; ?>% 
						<i class="glyphicon glyphicon-minus"></i>
					</span>
					<br>
					  	<a href="http://<?= $technique['link']; ?>" target="_blank" ><?= $technique['link']; ?></a>
					</h3>
					<br>


					<div class="progress">
						<!-- Programming model influence -->
						<div class="bar bar-success progress-bar progress-bar-success" role="progressbar" style="width: <?= $technique['Programming model']*100; ?>%" aria-valuemax="12.53">
							<?= $technique['Programming model']*100; ?>%
						</div>

						<!-- General testing characteristics influence -->
						<div class="bar bar-info progress-bar progress-bar-info" role="progressbar" style="width: <?= $technique['General testing characteristics']*100; ?>%" aria-valuemax="48.72">
							<?= $technique['General testing characteristics']*100; ?>%
						</div>

						<div class="bar bar-warning progress-bar progress-bar-warning" role="progressbar" style="width: <?= $technique['Concurrent testing characteristics']*100; ?>%" aria-valuemax="32.04">
							<?= $technique['Concurrent testing characteristics']*100; ?>%
						</div>
						<div class="bar bar-danger progress-bar progress-bar-danger" role="progressbar" style="width: <?= $technique['Testing tool support']*100; ?>%" aria-valuemax="6.7">
							<?= $technique['Testing tool support']*100; ?>%
						</div>
					</div>

				</div>

				<? 
					unset($technique['Programming model']);
					unset($technique['General testing characteristics']);
					unset($technique['Concurrent testing characteristics']);
					unset($technique['Testing tool support']);
					unset($technique['link']);
				?>

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