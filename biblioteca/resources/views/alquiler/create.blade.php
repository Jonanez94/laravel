@extends('plantillas.principal')
@section('title','REGISTRO DE PRESTAMOS')
@section('content')
	<div id="msj_success" class="alert alert-success" role="alert" style="display: none;"><strong>Excelente!</strong> Ha finalizado la operación</div>
	<div class="panel panel-default">
		<div class="panel-heading">Registro de prestamos</div>
		<div class="panel-body">
			<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
			<div class="form-group">
				<label>Titulo</label>
				<select id="titulo" class="form-control"></select>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Fecha de salida</label>
						<input id="fecha_salida" class="form-control" type="date" name="fecha_salida" placeholder="Ingrese la fecha de salida">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Fecha de entrada</label>
						<input id="fecha_entrada" class="form-control" type="date" name="fecha_entrada" placeholder="Ingrese la fecha de entrada">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Lector</label>
						<select id="lector" class="form-control"></select>
					</div>
				</div>
			</div>
			{!!link_to('#', $title='Registrar', $attributes = ['id'=>'btn_registrar','class'=>'btn btn-lg btn-primary'], $secure = null)!!}
		</div>
	</div>
@endsection
@section('scripts')
	<script src="{{asset('js/alquiler2.js')}}"></script>
@endsection