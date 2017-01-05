$(document).ready(function() {
	CargarCategorias();
});

function CargarCategorias(){
	var tablaDatos = $("#lista_categorias");
	var ruta = "/listacategorias";

	$("#lista_categorias").empty();
	$.get(ruta, function(res) {
		$(res).each(function(key,value){
			tablaDatos.append(""+
				"<tr>"+
					"<td>"+value.categoria+"</td>"+
					"<td>"+
						"<button class='btn btn-warning' value="+value.id+" OnClick='MostrarInformacionCategoria(this)' "+
						"data-toggle='modal' data-target='#myModal'﻿>Editar</button>"+
						"		<button class='btn btn-danger' value="+value.id+" OnClick='Eliminar(this)'>Eliminar</button>"+
					"</td>"+
				"</tr>");
		});
	});
}

function MostrarInformacionCategoria(btn){
	var ruta = "/categoria/"+btn.value+"/edit";

	$.get(ruta, function(res) {
		$("#btn_actualizar").val(res.id);
		$("#categoria_up").val(res.categoria);
	});
}

function Eliminar(btn){
	var ruta = "/categoria/"+btn.value+"";
    var token = $("#token").val();

    $.ajax({
    	url: ruta,
    	headers: {'X-CSRF-TOKEN':token},
    	type: 'DELETE',
    	dataType: 'json',
    	success: function(){
    		CargarCategorias();
    	}
    })
}

$("#btn_registrar").click(function(){
	var datos = {
		"categoria" : $("#categoria").val()
	};

	var ruta = "/categoria";
	var token = $("#token").val();

	$.ajax({
		url: ruta,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data: datos,
	})
	.done(function() {
		$("#categoria").val("");
		CargarCategorias();
	})
	.fail(function() {
		console.log("error");
	})
	
});

$("#btn_actualizar").click(function(){
	var value = $("#btn_actualizar").val();
	var datos = {
            "categoria"	: $("#categoria_up").val()
    };
    var ruta = "/categoria/"+value+"";
    var token = $("#token").val();

    $.ajax({
    	url: ruta,
    	headers: {'X-CSRF-TOKEN':token},
    	type: 'PUT',
    	dataType: 'json',
    	data: datos,
    	success: function(){
    		CargarCategorias();
    		$("#myModal").modal('toggle');
    	}
    })
    
});
