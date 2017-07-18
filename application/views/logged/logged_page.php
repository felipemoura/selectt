<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<? $this->load->view('templates/header_logged'); ?>

<div class="container animated fadeIn">

  <h1>Welcome to Sellect</h1>

  	<? if (isset($logado['TEXT'])): ?>
		<?= $logado['TEXT']; ?>
	<? endif; ?>

</div>


<!-- START OF FOOTER -->
<?	$this->load->view('templates/footer'); ?>
<!-- END OF IT  -->

</body>
</html>