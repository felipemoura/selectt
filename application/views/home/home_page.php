<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- START OF HEADER -->
<? $this->load->view('templates/header'); ?>
<!-- END OF HEADER -->

<div class="container animated fadeIn">
	<h1>Home</h1>

	<? if (isset($home['TEXT'])): ?>
		<?= $home['TEXT']; ?>
	<? endif; ?>

</div>

<!-- START OF FOOTER -->
<?	$this->load->view('templates/footer'); ?>
<!-- END OF FOOTER  -->

</body>
</html>