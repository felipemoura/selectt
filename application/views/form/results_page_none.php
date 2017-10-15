<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<? $this->load->view('templates/header'); ?>

<style type="text/css">
	.panel {
		font-size: 12pt;
		/*max-width: 500px;*/
		min-width: 500px;
		min-height: 200px;
		max-height: 200px;
	}

	.panel-body {
		font-size: 12pt;
	}
</style>

<div class="container animated fadeIn">

	<h1>Results Page</h1>

  	<h5>No result in this session, run a form to get results <?	if (count($userResults) > 0) : ?> or chose from history below !<? endif; ?></h5>

  	<br>
  	<br>
  	
	<?	if (count($userResults) > 0) : ?>

            
		<div class="panel panel-default" style="overflow-y: scroll; height: 200px">
			<div class="panel-heading">Results History</div>
				<div class="mid-width wrapItems" style="height:<?= count($userResults)  * 40 ?>px">
 					<div class="panel-body">
		 				<ul>
							<? foreach ($userResults as $result) : ?>
			  					<li>
			  						<a href="<?= base_url('results/setNow/'. $result['id']); ?>">
			  							<?= $result['insertedOn'] ?> 
			  							<?= $result['title'] ?> 
			  						</a>
			  					</li>
							<? endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>

	<? endif; ?> 
</div>


<!-- START OF FOOTER -->
<? $this->load->view('templates/footer'); ?>
<!-- END OF IT  -->

</body>
</html>