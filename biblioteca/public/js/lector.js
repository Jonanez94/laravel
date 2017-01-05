$(document).ready(function() {
	CargarLectores();
});

function CargarLectores(){
	var tablaDatos = $("#lista_lectores");
	var ruta = "/listalectores";

	$("#lista_lectores").empty();
	$.get(ruta, function(res) {
		$(res).each(function(key,value){
			tablaDatos.append(""+
				"<tr>"+
					"<td>"+value.nombre+"</td>"+
					"<td>"+value.correo+"</td>"+
					"<td>"+value.edad+"</td>"+
					"<td>"+value.direccion+"</td>"+
					"<td>"+value.observaciones+"</td>"+
					"<td>"+
						"<button class='btn btn-warning' value="+value.id+" OnClick='MostrarInformacionLector(this)' "+
						"data-toggle='modal' data-target='#myModal'﻿>Editar</button>"+
						"		<button class='btn btn-danger' value="+value.id+" OnClick='Eliminar(this)'>Eliminar</button>"+
					"</td>"+
				"</tr>");
		});
	});
}

function MostrarInformacionLector(btn){
	
	var ruta = "/lector/"+btn.value+"/edit";

	$.get(ruta, function(res) {
		$("#btn_actualizar").val(res.id);
		$("#nombre").val(res.nombre);
		$("#correo").val(res.correo);
		$("#edad").val(res.edad);
		$("#direccion").val(res.direccion);
		$("#observaciones").val(res.observaciones);
	});
}

function Eliminar(btn){
	var ruta = "/lector/"+btn.value+"";
    var token = $("#token").val();

    $.ajax({
    	url: ruta,
    	headers: {'X-CSRF-TOKEN':token},
    	type: 'DELETE',
    	dataType: 'json',
    	success: function(){
    		CargarLectores();
    		$("#msj_success").fadeIn();
    	}
    })
}

$("#btn_registrar").click(function(){
	var datos = {
            "nombre"	: $("#nombre").val(),
			"correo"	: $("#correo").val(),
			"edad" : $("#edad").val(),
			"password" : $("#password").val(),
			"direccion"	: $("#direccion").val(),
			"observaciones"	: $("#observaciones").val()
    };

	var ruta = "/lector";
	var token = $("#token").val();

	$.ajax({
		url: ruta,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data: datos,
	})
	.done(function() {
		console.log("success");

	})
	.fail(function() {
		console.log("error");
	})	
	
});



$("#btn_actualizar").click(function(){
	var value = $("#btn_actualizar").val();
	var datos = {
            "nombre"	: $("#nombre").val(),
			"correo"	: $("#correo").val(),
			"edad" : $("#edad").val(),
			"direccion"	: $("#direccion").val(),
			"observaciones"	: $("#observaciones").val()
    };
    var ruta = "/lector/"+value+"";
    var token = $("#token").val();

    $.ajax({
    	url: ruta,
    	headers: {'X-CSRF-TOKEN':token},
    	type: 'PUT',
    	dataType: 'json',
    	data: datos,
    	success: function(){
    		CargarLectores();
    		$("#myModal").modal('toggle');
    		$("#msj_success").fadeIn();
    	}
    })
    
});
