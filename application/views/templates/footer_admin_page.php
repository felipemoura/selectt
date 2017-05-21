<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<footer class="footer">
  <div class="container">
	<hr>
    <p>© Copyright 2017 Selectt Project</p>
  </div>
</footer>

<script src="<? echo base_url("assets/js/jquery.min.js");?>" 	type="text/javascript"></script>
<script src="<? echo base_url("assets/js/bootstrap.min.js");?>" type="text/javascript"></script>

<?php if($this->uri->segment(1)=="admin"){
echo '<script src="' . base_url("assets/media/js/jquery.dataTables.min.js")  	. '" type="text/javascript"></script>';
echo '<script src="' . base_url("assets/media/js/dataTables.bootstrap.min.js")  . '" type="text/javascript"></script>';
echo '<script src="' . base_url("assets/js/admin_records.js")  					. '" type="text/javascript"></script>';
}?>

<? if (isset($record)): ?>
<script type="text/javascript">

	    var start = 1950;
		var end = new Date().getFullYear();
		var options = "<option> </option>";

		for(var year = end ; year >= start; year--){
		  options += "<option>"+ year +"</option>";
		}
		document.getElementById("inputYear").innerHTML = options;

<?php foreach ($record as $key => $item): ?>
		<? if ($key == "ID") { continue; } ?>

		$('#input<?php echo str_replace(' ', '', $key); ?>').val('<?php echo $item; ?>');

<?php endforeach; ?>



    function toggleCheckbox(el) {
      var theId = el.id.replace("check","");

      if( el.checked ){
         $("#" + theId).prop('disabled', true);
      }else{
         $("#" + theId).prop('disabled', false);
      }
    }
</script>
<? endif; ?>

</body>
</html>