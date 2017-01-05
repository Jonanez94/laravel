$(document).ready(function(){
	CargarValores();
});

function CargarValores(){
	$("#titulo").val("");
	$("#fecha_salida").val("");
	$("#fecha_entrada").val("");
	$("#lector").val("");
	CargarTitulos();
	$('#fecha_salida').val("2017-01-02");
	$('#fecha_entrada').val("2017-01-03");
	CargarLectores();
}

function CargarLectores(){
	var selector = $("#lector");
	var ruta = "/listalectores";

	$.get(ruta, function(res) {
		$(res).each(function(key,value){
			selector.append("<option value="+value.id+">"+value.nombre+"</option>");
		});
	});
}

function CargarTitulos(){
	var selector = $("#titulo");
	var ruta = "/listatitulos";

	$.get(ruta, function(res) {
		$(res).each(function(key,value){
			selector.append("<option value="+value.id+">"+value.titulo+"</option>");
		});
	});
}

$("#btn_registrar").click(function(){
	
	var datos = {
		"fk_libro" : $("#titulo").val(),
		"fecha_salida" : $("#fecha_salida").val(),
		"fecha_entrada" : $("#fecha_entrada").val(),
		"fk_lector" : $("#lector").val()
	};

	var ruta = "/prestamo";
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
