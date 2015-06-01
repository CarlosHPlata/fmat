$("#datatables").DataTable({
	processing: true,
	serverSide: true,
	ajax: $('#url').val(),
	columns: [
		{data: 'nombreusuario', name: 'nombreusuario'},
		{data: 'nombre', name: 'nombre'},
		{data: 'puntos', name: 'puntos'},
		{data: 'actividad', name: 'actividad'},
		{data: 'reportes', name: 'reportes'},
		{data: 'acciones', name: 'acciones'}
	]
});


$('#submit').click(function(e){
    e.preventDefault();
    var r = confirm("Seguro que vas a reportar a este usuario?");
    if (r == true) {
        var url = $('#urlreport').val();
        var data = $('#form-report').serialize();

        $.post(url, data, function(result){
            if (result == "done"){
                $('#modal1').closeModal();
                Materialize.toast('Tu reporte ha sido enviado!', 4000)
            }
        }).fail( function () {
            alert('Hubo un error en el servidor intentelo mas tarde');
        });
    }
});



function modal(url){
    event.preventDefault();
    $('#razon').val('');
    $('#urlreport').val( url );
    $('#modal1').openModal();
}