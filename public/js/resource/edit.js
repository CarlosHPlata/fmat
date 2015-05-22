$(document).ready(function() {
    $('#removefile').click( function(e) {

    	e.preventDefault();

    	var url = $('#url').attr('href');
    	var data = $('#form-file').serialize();

    	$.post(url, data, function(result){
    		if (result == "done"){
    			$('#input').fadeOut(function () {
    				$(this).html( $('#file-input').html() );
    				$(this).fadeIn();	
    			});
    		}
    	}).fail( function () {
    		alert('Hubo un error en el servidor intentelo mas tarde');
    	});

    });
});