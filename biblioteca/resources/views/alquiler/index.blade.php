@extends('plantillas.principal')
@section('title','PRESTAMOS')
@section('content')
	<div class="panel-group">
	  	<div class="panel panel-default">
	    	<div class="panel-heading">Lista de libros</div>
	    	<div class="panel-body">
	    		<div class="table-responsive">
			    	<table class="table table-striped">
			    		<thead>
			    			<th>LIBRO</th>
			    			<th>FECHA DE SALIDA</th>
			    			<th>FECHA DE ENTRADA</th>
			    			<th>LECTOR</th>
			    			<th>OPERACIONES</th>
			    		</thead>
			    		<tbody id="lista_prestamos">
			    		</tbody>
			    	</table>
		    	</div>
	    	</div>
	    	<div class="panel-footer"><a href="/prestamo/create">Presiona aqui para registrar un <strong>prestamo</strong></a></div>
	  	</div>
	</div>
	@extends('plantillas.modal')
	@section('modal_titulo','Edición de prestamos')
	@section('modal_datos')
		<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
		<label>Fecha de salida</label>
		<input id="fecha_salida" class="form-control" type="date" name="fecha_salida">
		<label>Fecha de entrada</label>
		<input id="fecha_entrada" class="form-control" type="date" name="fecha_entrada">
	@endsection
@endsection
@section('scripts')
	<script src="{{asset('js/alquiler.js')}}"></script>
@endsection