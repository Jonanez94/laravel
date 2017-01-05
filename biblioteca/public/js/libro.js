$(document).ready(function(){
	CargarLibros();
});

function CargarAutores(){
	var selector = $("#autor");
	var ruta = "/listaautores";

	$.get(ruta, function(res) {
		$(res).each(function(key,value){
			selector.append("<option value="+value.id+">"+value.autor+"</option>");
		});
	});
}

function CargarCategorias(){
	var selector = $("#categoria");
	var ruta = "/listacategorias";

	$.get(ruta, function(res) {
		$(res).each(function(key,value){
			selector.append("<option value="+value.id+">"+value.categoria+"</option>");
		});
	});
}

function CargarEditoriales(){
	var selector = $("#editorial");
	var ruta = "/listaeditoriales";

	$.get(ruta, function(res) {
		$(res).each(function(key,value){
			selector.append("<option value="+value.id+">"+value.editorial+"</option>");
		});
	});
}

function CargarLibros(){
	var tablaDatos = $("#lista_libros");
	var ruta = "/listalibros";

	$("#lista_libros").empty();
	$.get(ruta, function(res) {
		$(res).each(function(key,value){
			tablaDatos.append(""+
				"<tr>"+
					"<td>"+value.titulo+"</td>"+
					"<td>"+value.fecha_lanzamiento+"</td>"+
					"<td>"+value.autor+"</td>"+
					"<td>"+value.categoria+"</td>"+
					"<td>"+value.editorial+"</td>"+
					"<td>"+value.descripcion+"</td>"+
					"<td>"+value.paginas+"</td>"+
					"<td>"+
						"<button class='btn btn-warning' value="+value.id+" OnClick='MostrarInformacionLibro(this)' "+
						"data-toggle='modal' data-target='#myModal'﻿>Editar</button>"+
						"		<button class='btn btn-danger' value="+value.id+" OnClick='Eliminar(this)'>Eliminar</button>"+
					"</td>"+
				"</tr>");
		});
	});
}

function Eliminar(btn){
	var ruta = "/libro/"+btn.value+"";
    var token = $("#token").val();

    $.ajax({
    	url: ruta,
    	headers: {'X-CSRF-TOKEN':token},
    	type: 'DELETE',
    	dataType: 'json',
    	success: function(){
    		CargarLibros();
    	}
    })
}

function MostrarInformacionLibro(btn){
	$("#autor").empty();
	$("#categoria").empty();
	$("#editorial").empty();
	CargarAutores();
	CargarCategorias();
	CargarEditoriales();

	var ruta = "/datoslibro/"+btn.value;
	$("#btn_actualizar").val(btn.value);

	$.get(ruta, function(res) {
		$("#titulo").val(res[0].titulo);
		$("#fecha_lanzamiento").val(res[0].fecha_lanzamiento);
		$("#autor").val(res[0].autor);
		$("#categoria").val(res[0].categoria);
		$("#editorial").val(res[0].editorial);
		$("#descripcion").val(res[0].descripcion);
		$("#paginas").val(res[0].paginas);
	});

}

$("#btn_actualizar").click(function(){
	var value = $("#btn_actualizar").val();
	var datos = {
		"titulo" : $("#titulo").val(),
		"fecha_lanzamiento" : $("#fecha_lanzamiento").val(),
		"fk_autor" : $("#autor").val(),
		"fk_categoria" : $("#categoria").val(),
		"fk_editorial" : $("#editorial").val(),
		"descripcion" : $("#descripcion").val(),
		"paginas" : $("#paginas").val()
	};

	var ruta = "/libro/"+value+"";
    var token = $("#token").val();

    $.ajax({
    	url: ruta,
    	headers: {'X-CSRF-TOKEN':token},
    	type: 'PUT',
    	dataType: 'json',
    	data: datos,
    })
    .done(function() {
    	CargarLibros();
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
