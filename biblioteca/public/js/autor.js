$(document).ready(function() {
	CargarAutores();
});

function CargarAutores(){
	var tablaDatos = $("#lista_autores");
	var ruta = "/listaautores";

	$("#lista_autores").empty();
	$.get(ruta, function(res) {
		$(res).each(function(key,value){
			tablaDatos.append(""+
				"<tr>"+
					"<td>"+value.autor+"</td>"+
					"<td>"+
						"<button class='btn btn-warning' value="+value.id+" OnClick='MostrarInformacionAutor(this)' "+
						"data-toggle='modal' data-target='#myModal'﻿>Editar</button>"+
						"		<button class='btn btn-danger' value="+value.id+" OnClick='Eliminar(this)'>Eliminar</button>"+
					"</td>"+
				"</tr>");
		});
	});
}

function MostrarInformacionAutor(btn){
	var ruta = "/autor/"+btn.value+"/edit";

	$.get(ruta, function(res) {
		$("#btn_actualizar").val(res.id);
		$("#autor_up").val(res.autor);
	});
}

function Eliminar(btn){
	var ruta = "/autor/"+btn.value+"";
    var token = $("#token").val();

    $.ajax({
    	url: ruta,
    	headers: {'X-CSRF-TOKEN':token},
    	type: 'DELETE',
    	dataType: 'json',
    	success: function(){
    		CargarAutores();
    	}
    })
}

$("#btn_registrar").click(function(){
	var datos = {
		"autor" : $("#autor").val()
	};

	var ruta = "/autor";
	var token = $("#token").val();

	$.ajax({
		url: ruta,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data: datos,
	})
	.done(function() {
		$("#autor").val("");
		CargarAutores();
	})
	.fail(function() {
		console.log("error");
	})
	
});

$("#btn_actualizar").click(function(){
	var value = $("#btn_actualizar").val();
	var datos = {
            "autor"	: $("#autor_up").val()
    };
    var ruta = "/autor/"+value+"";
    var token = $("#token").val();

    $.ajax({
    	url: ruta,
    	headers: {'X-CSRF-TOKEN':token},
    	type: 'PUT',
    	dataType: 'json',
    	data: datos,
    	success: function(){
    		CargarAutores();
    		$("#myModal").modal('toggle');
    	}
    })
    
});
