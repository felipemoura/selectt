<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<!-- START OF HEADER -->
<? $this->load->view('templates/header'); ?>
<!-- END OF HEADER -->


<div class="container animated fadeIn">

	<h1>Publications</h1>

	<? if (isset($publication['TEXT'])): ?>
		<?= $publication['TEXT']; ?>
	<? endif; ?>

</div>

<!-- START OF FOOTER -->
<?	$this->load->view('templates/footer'); ?>
<!-- END OF IT  -->

</body>
</html>

