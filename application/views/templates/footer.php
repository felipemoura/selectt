<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- FOOTER -->
<footer class="footer">
  <div class="container">
	<hr>
    <p>© Copyright 2017 Selectt Project</p>
  </div>
</footer>

<!-- SCRIPTS -->
<script src="<? echo base_url("assets/js/jquery.min.js");?>" 	type="text/javascript"></script>
<script src="<? echo base_url("assets/js/bootstrap.min.js");?>" type="text/javascript"></script>

<?php if($this->uri->segment(1)=="insert_test"){
	echo '<script src="' . base_url("assets/js/insert_custom.js") . '" type="text/javascript"></script>';
}?>


<?php if($this->uri->segment(1)=="available-techniques"){
	echo '<script src="' . base_url("assets/media/js/jquery.dataTables.min.js") . '" type="text/javascript"></script>';
	echo '<script src="' . base_url("assets/media/js/dataTables.bootstrap.min.js") . '" type="text/javascript"></script>';
	echo '<script src="' . base_url("assets/js/available_technique.js") . '" type="text/javascript"></script>';
}?>
	
<!-- END OF IT  -->
</body>
</html>

