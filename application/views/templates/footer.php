<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<footer class="footer">
  <div class="container">
	<hr>
    <p>© Copyright 2017 Selectt Project</p>
  </div>
</footer>

<script src="<? echo base_url("assets/js/jquery.min.js");?>" 	type="text/javascript"></script>
<script src="<? echo base_url("assets/js/bootstrap.min.js");?>" type="text/javascript"></script>

<?php if($this->uri->segment(1)=="insert_test"){
	echo '<script src="' . base_url("assets/js/insert_custom.js") . '" type="text/javascript"></script>';
}?>


<?php if($this->uri->segment(2)=="showInfo"){
	echo '<script src="' . base_url("assets/js/available_technique.js") . '" type="text/javascript"></script>';
}?>
	

</body>
</html>