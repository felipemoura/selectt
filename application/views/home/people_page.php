<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- START OF HEADER -->
<? $this->load->view('templates/header'); ?>
<!-- END OF HEADER -->

<div class="container animated fadeIn">

	<h1>People</h1>
	
	<? if (isset($people['TEXT'])): ?>
		<?= $people['TEXT']; ?>
	<? endif; ?>

</div>

<!-- START OF FOOTER -->
<?	$this->load->view('templates/footer'); ?>
<!-- END OF FOOTER  -->

</body>
</html>