$(document).ready(function(){
	CargarPrestamos();
});

function CargarPrestamos(){
	var tablaDatos = $("#lista_prestamos");
	var ruta = "/listaprestamos";

	$("#lista_prestamos").empty();
	$.get(ruta, function(res) {
		$(res).each(function(key,value){
			tablaDatos.append(""+
				"<tr>"+
					"<td>"+value.titulo+"</td>"+
					"<td>"+value.fecha_salida+"</td>"+
					"<td>"+value.fecha_entrada+"</td>"+
					"<td>"+value.nombre+"</td>"+
					"<td>"+
						"<button class='btn btn-warning' value="+value.id+" OnClick='MostrarInformacionPrestamo(this)' "+
						"data-toggle='modal' data-target='#myModal'﻿>Editar</button>"+
						"		<button class='btn btn-danger' value="+value.id+" OnClick='Eliminar(this)'>Eliminar</button>"+
					"</td>"+
				"</tr>");
		});
	});
}

function Eliminar(btn){
	var ruta = "/prestamo/"+btn.value+"";
    var token = $("#token").val();

    $.ajax({
    	url: ruta,
    	headers: {'X-CSRF-TOKEN':token},
    	type: 'DELETE',
    	dataType: 'json',
    	success: function(){
    		CargarPrestamos();
    	}
    })
}

function MostrarInformacionPrestamo(btn){

	var ruta = "/prestamo/"+btn.value+"/edit";

	$.get(ruta, function(res) {
		$("#btn_actualizar").val(res.id);
		$("#fecha_salida").val(res.fecha_salida);
		$("#fecha_entrada").val(res.fecha_entrada);
	});

}

$("#btn_actualizar").click(function(){
	var value = $("#btn_actualizar").val();
	var datos = {
		"fecha_salida" : $("#fecha_salida").val(),
		"fecha_entrada" : $("#fecha_entrada").val()
	};

	var ruta = "/prestamo/"+value+"";
    var token = $("#token").val();

    $.ajax({
    	url: ruta,
    	headers: {'X-CSRF-TOKEN':token},
    	type: 'PUT',
    	dataType: 'json',
    	data: datos,
    })
    .done(function() {
    	CargarPrestamos();
    	$("#myModal").modal('toggle');
    	console.log("success");
    })
    .fail(function() {
    	console.log("error");
    })
    .always(function() {
    	console.log("complete");
    });
    
});
