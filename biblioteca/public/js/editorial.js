$(document).ready(function() {
	CargarEditoriales();
});

function CargarEditoriales(){
	var tablaDatos = $("#lista_editoriales");
	var ruta = "/listaeditoriales";

	$("#lista_editoriales").empty();
	$.get(ruta, function(res) {
		$(res).each(function(key,value){
			tablaDatos.append(""+
				"<tr>"+
					"<td>"+value.editorial+"</td>"+
					"<td>"+
						"<button class='btn btn-warning' value="+value.id+" OnClick='MostrarInformacionEditorial(this)' "+
						"data-toggle='modal' data-target='#myModal'﻿>Editar</button>"+
						"		<button class='btn btn-danger' value="+value.id+" OnClick='Eliminar(this)'>Eliminar</button>"+
					"</td>"+
				"</tr>");
		});
	});
}

function MostrarInformacionEditorial(btn){
	var ruta = "/editorial/"+btn.value+"/edit";

	$.get(ruta, function(res) {
		$("#btn_actualizar").val(res.id);
		$("#editorial_up").val(res.editorial);
	});
}

function Eliminar(btn){
	var ruta = "/editorial/"+btn.value+"";
    var token = $("#token").val();

    $.ajax({
    	url: ruta,
    	headers: {'X-CSRF-TOKEN':token},
    	type: 'DELETE',
    	dataType: 'json',
    	success: function(){
    		CargarEditoriales();
    	}
    })
}

$("#btn_registrar").click(function(){
	var datos = {
		"editorial" : $("#editorial").val()
	};

	var ruta = "/editorial";
	var token = $("#token").val();

	$.ajax({
		url: ruta,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data: datos,
	})
	.done(function() {
		$("#editorial").val("");
		CargarEditoriales();
	})
	.fail(function() {
		console.log("error");
	})
	
});

$("#btn_actualizar").click(function(){
	var value = $("#btn_actualizar").val();
	var datos = {
            "editorial"	: $("#editorial_up").val()
    };
    var ruta = "/editorial/"+value+"";
    var token = $("#token").val();

    $.ajax({
    	url: ruta,
    	headers: {'X-CSRF-TOKEN':token},
    	type: 'PUT',
    	dataType: 'json',
    	data: datos,
    	success: function(){
    		CargarEditoriales();
    		$("#myModal").modal('toggle');
    	}
    })
    
});
