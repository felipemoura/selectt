$(document).ready(function(){
      
    var start = 1950;
	var end = new Date().getFullYear();
	var options = "<option> </option>";

	for(var year = end ; year >= start; year--){
	  options += "<option>"+ year +"</option>";
	}
	document.getElementById("inputYear").innerHTML = options;

	function toggleCheckbox(el) {
      var theId = el.id.replace("check","");

      if( el.checked ){
         $("#" + theId).prop('disabled', true);
      }else{
         $("#" + theId).prop('disabled', false);
      }
    }

});