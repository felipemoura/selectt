<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<footer class="footer">
  <div class="container">
	<hr>
    <p>© Copyright 2017 Selectt Project</p>
  </div>
</footer>

<script src="<? echo base_url("assets/js/jquery.min.js");?>" 	type="text/javascript"></script>
<script src="<? echo base_url("assets/js/bootstrap.min.js");?>" type="text/javascript"></script>


<script type="text/javascript">
	<? if (isset($result)): ?>

    $(document).ready(function(){
        $('#myInfo').modal('show');

	    var start = 1950;
		var end = new Date().getFullYear();
		var options = "<option> </option>";

		for(var year = end ; year >= start; year--){
		  options += "<option>"+ year +"</option>";
		}
		document.getElementById("inputYear").innerHTML = options;

		<?php foreach ($result as $key => $item) : ?>

		$('#<?php echo $key ?>').val('<?php echo $item; ?>');
		
		<?php endforeach; ?>

	});
	<? endif; ?>
</script>

</body>
</html>