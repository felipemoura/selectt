$(document).ready(function(){
      
    var start = 1950;
	var end = new Date().getFullYear();
	var options = "<option> </option>";

	for(var year = end ; year >= start; year--){
	  options += "<option>"+ year +"</option>";
	}
	document.getElementById("inputYear").innerHTML = options;

});