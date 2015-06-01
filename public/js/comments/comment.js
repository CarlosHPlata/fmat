$(function(){


	$('#form-comment').submit(function(e){
		e.preventDefault();
		var comment = $('#comment').val();

		if (comment != ''){
			var data = $(this).serialize();
			var url =  $('#url').val();
			data += '&type='+$('#type').val()+'&idtype='+$('#id').val();

			$.post(url, data, function(result){
				location.reload();
			}).fail( function () {
				alert('Hubo un error en el servidor intentelo mas tarde');
			});
		} else {
			Materialize.toast('Tu comentario debe tener contenido duh!', 4000) // 4000 is the duration of the toast
		}
		// var anon = $('#filled-in-box').is(':checked');

		// if (anon)
		// 	$('#newcomment').find('#user').html('anonimo');
		// else
		// 	$('#newcomment').find('#user').html('usuario');

		// $('#newcomment').find('#content').html(comment);

		// var newcomment = $('#newcomment').html();

		// $('#newcomments').prepend( newcomment );
		// newcomment.show('slow')
	})

	$('.form-update').submit(function(e){
		e.preventDefault();
		var comment = $(this).find('#comment').val();

		if (comment != ''){
			var data = $(this).serialize();
			var url =  $(this).attr('action');
			data += '&type='+$('#type').val()+'&idtype='+$('#id').val();

			$.post(url, data, function(result){
				location.reload();
			}).fail( function () {
				alert('Hubo un error en el servidor intentelo mas tarde');
			});
		} else {
			Materialize.toast('Tu comentario debe tener contenido duh!', 4000) // 4000 is the duration of the toast
		}
	})


});

function showupdate(id, event){
	event.preventDefault();
	var idup = id+'-update';
	var idcom = id+'-comment';

	$('#'+idcom).hide('slow');
	$('#'+idup).show('slow');
}

function hideupdate(id, event){
	event.preventDefault();
	var idup = id+'-update';
	var idcom = id+'-comment';

	$('#'+idup).hide('slow');
	$('#'+idcom).show('slow');
}

function destroy(id, event){
	event.preventDefault();
	var idel = id+'-delete';
	var idcom = id+'-comment';
	var idup = id+'-update';

	var data = $('#'+idel).serialize();
	var url = $('#'+idel).attr('action');

	alert(url + '\n------------------\n'+ data);

	$.post(url, data, function(result){
		$('#'+idcom).hide('slow', function() { $(this).remove(); });
		$('#'+idel).remove();
		$('#'+idup).remove();
	}).fail( function () {
		alert('Hubo un error en el servidor intentelo mas tarde');
	});
}