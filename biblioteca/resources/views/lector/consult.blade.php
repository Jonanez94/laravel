@extends('plantillas.principal')
@section('title', 'LECTORES')
@section('content')
	<div id="msj_success" class="alert alert-success" role="alert" style="display: none;">Exito</div>
	<div class="panel-group">
	  	<div class="panel panel-default">
	    	<div class="panel-heading">Lista de lectores</div>
	    	<div class="panel-body">
	    		<div class="table-responsive">
			    	<table class="table table-bordered">
			    		<thead>
			    			<th>NOMBRE</th>
			    			<th>E-MAIL</th>
			    			<th>EDAD</th>
			    			<th>DIRECCION</th>
			    			<th>OBSERVACIONES</th>
			    			<th>OPERACIONES</th>
			    		</thead>
			    		<tbody id="lista_lectores">
			    		</tbody>
			    	</table>
		    	</div>
	    	</div>
	    	<div class="panel-footer"><a href="/lector/create">Presiona en este link para registrar un <strong>usuario nuevo</strong></a></div>
	  	</div>
	</div>
	@extends('plantillas.modal')
	@section('modal_titulo','Edición de lectores')
	@section('modal_datos')
		<label for="nombre">Nombre</label>
	    <input type="text" name="nombre" id="nombre" class="form-control">
	    <label for="correo">E-mail</label>
	    <input type="email" name="correo" id="correo" class="form-control">
	    <label for="edad">Edad</label>
	    <input type="number" name="edad" id="edad" class="form-control">
	    <label for="direccion">Dirección</label>
	    <input type="text" name="direccion" id="direccion" class="form-control">
	    <label for="observaciones">Observaciones</label>
	    <input type="text" name="observaciones" id="observaciones" class="form-control">
	@endsection
@endsection
@section('scripts')
	<script src="{{asset('js/lector.js')}}"></script>
@endsection