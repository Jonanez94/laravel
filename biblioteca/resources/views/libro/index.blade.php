@extends('plantillas.principal')
@section('title','LIBROS')
@section('content')
	<div class="panel-group">
	  	<div class="panel panel-default">
	    	<div class="panel-heading">Lista de libros</div>
	    	<div class="panel-body">
	    		<div class="table-responsive">
			    	<table class="table table-striped">
			    		<thead>
			    			<th>TITULO</th>
			    			<th>FECHA DE LANZAMIENTO</th>
			    			<th>AUTOR</th>
			    			<th>CATEGORIA</th>
			    			<th>EDITORIAL</th>
			    			<th>DESCRIPCION</th>
			    			<th>PAGINAS</th>
			    			<th>OPERACIONES</th>
			    		</thead>
			    		<tbody id="lista_libros">
			    		</tbody>
			    	</table>
		    	</div>
	    	</div>
	    	<div class="panel-footer"><a href="/libro/create">Presiona aqui para registrar un <strong>libro nuevo</strong></a></div>
	  	</div>
	</div>
	@extends('plantillas.modal')
	@section('modal_titulo','Edición de libros')
	@section('modal_datos')
		<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
		<label>Titulo</label>
		<input id="titulo" class="form-control" type="text" name="titulo">
		<label>Fecha de lanzamiento</label>
		<input id="fecha_lanzamiento" class="form-control" type="date" name="fecha_lanzamiento">
		<label>Autor</label>
		<select id="autor" class="form-control"></select>
		<label>Categoría</label>
		<select id="categoria" class="form-control"></select>
		<label>Editorial</label>
		<select id="editorial" class="form-control"></select>
		<label>Descripción</label>
		<input type="text" name="descripcion" id="descripcion" class="form-control">
		<label>Páginas</label>
		<input type="number" name="paginas" id="paginas" class="form-control">
	@endsection
@endsection
@section('scripts')
	<script src="{{asset('js/libro.js')}}"></script>
@endsection