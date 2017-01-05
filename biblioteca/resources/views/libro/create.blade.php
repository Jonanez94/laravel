@extends('plantillas.principal')
@section('title','REGISTRO DE LIBROS')
@section('content')
	<div id="msj_success" class="alert alert-success" role="alert" style="display: none;"><strong>Excelente!</strong> Ha finalizado la operación</div>
	<div class="panel panel-default">
		<div class="panel-heading">Registro de libros</div>
		<div class="panel-body">
			<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
			<div class="form-group">
				<label>Titulo</label>
				<input id="titulo" class="form-control" type="text" name="titulo" placeholder="Ingrese el titulo del libro">
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Fecha de lanzamiento</label>
						<input id="fecha_lanzamiento" class="form-control" type="date" name="fecha_lanzamiento" placeholder="Ingrese la fecha de lanzamiento">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Autor</label>
						<select id="autor" class="form-control">
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Categoría</label>
						<select id="categoria" class="form-control">
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Editorial</label>
						<select id="editorial" class="form-control">
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-9">
					<div class="form-group">
						<label>Descripción</label>
						<input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Ingrese una descripción del libro">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>No. Páginas</label>
						<input id="paginas" class="form-control" type="number" name="paginas" placeholder="Ingrese el número de páginas">
					</div>	
				</div>
			</div>
			{!!link_to('#', $title='Registrar', $attributes = ['id'=>'btn_registrar','class'=>'btn btn-lg btn-primary'], $secure = null)!!}
		</div>
	</div>
@endsection
@section('scripts')
	<script src="{{asset('js/libro2.js')}}"></script>
@endsection