<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<? $this->load->view('templates/header_logged'); ?>


<? if (isset($info)) : ?>
<div class="container animated fadeIn">

	<h1>Form Page</h1>

	<h5>Results from <?= $info['title']; ?></h5>

</div>
<? endif; ?>


<!-- START OF FOOTER -->
<? $this->load->view('templates/footer'); ?>
<!-- END OF IT  -->

</body>
</html>