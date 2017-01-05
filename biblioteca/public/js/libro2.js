$(document).ready(function(){
	CargarValores();
});

function CargarValores(){
	$("#titulo").val("");
	$("#fecha_lanzamiento").val("");
	$("#autor").val("");
	$("#categoria").val("");
	$("#editorial").val("");
	$("#descripcion").val("");
	$("#paginas").val("");
	$('#fecha_lanzamiento').val("2017-01-01");
	CargarAutores();
	CargarCategorias();
	CargarEditoriales();
}

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


$("#btn_registrar").click(function(){
	
	var datos = {
		"titulo" : $("#titulo").val(),
		"fecha_lanzamiento" : $("#fecha_lanzamiento").val(),
		"fk_autor" : $("#autor").val(),
		"fk_categoria" : $("#categoria").val(),
		"fk_editorial" : $("#editorial").val(),
		"descripcion" : $("#descripcion").val(),
		"paginas" : $("#paginas").val()
	};

	var ruta = "/libro";
	var token = $("#token").val();

	$.ajax({
		url: ruta,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data: datos,
	})
	.done(function() {
		CargarValores();
		$("#msj_success").show();
		$("#msj_success").fadeOut(2000);
		console.log("success");
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	

});
