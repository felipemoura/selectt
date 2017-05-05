$(document).ready(function () {
    $('#register').hide();
	$( '#register' ).removeClass( "hide" );


    $('#tab').hide();
	$( '#tab' ).removeClass( "hide" );
        

    $('#btnRegister').click(function(){ 
    	$('#register').show();
        $('#login').hide();  
    });

    $('#btnConfirm').click(function(){ 
        $('#login').show(); 
        $('#register').hide();
    });

    $('#btnLogin').click(function(){ 
    	$('#tab').show();
        $('#login').hide();  
    });

    $('#btnLogout').click(function(){ 
        $('#login').show();  
    	$('#tab').hide();
    });


});
