<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- FOOTER -->
<footer class="footer">
	<div class="container">
		<hr>
		<p>© Copyright <span id="year"></span> Selectt Project</p>
	</div>
</footer>

<!-- JAVA SCRIPTS -->
<script src="<? echo base_url("assets/js/jquery.min.js");?>" 	type="text/javascript"></script>
<script src="<? echo base_url("assets/media/lib/bootstrap-3/bootstrap.min.js");?>" type="text/javascript"></script>

<script type="text/javascript">
	document.getElementById("year").innerHTML = new Date().getFullYear();
</script>