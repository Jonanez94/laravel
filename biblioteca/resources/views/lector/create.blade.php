@extends('plantillas.principal')
@section('title', 'AGREGAR LECTORES')
@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">Agregar lectores</div>
	    	<div class="panel-body">
	    		{!!Form::open()!!}
	    			<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
	    			<div class="form-group">
	    				<label>Nombre</label>
	    				<input id="nombre" type="text" name="nombre" class="form-control">
	    			</div>
	    			<div class="form-group">
	    				<label>Correo</label>
	    				<input id="correo" type="email" name="correo" class="form-control">
	    			</div>
	    			<div class="form-group">
	    				<label>Edad</label>
	    				<input id="edad" type="number" name="edad" class="form-control">
	    			</div>
	    			<div class="form-group">
	    				<label>Direccion</label>
	    				<input id="direccion" type="text" name="direccion" class="form-control">
	    			</div>
	    			<div class="form-group">
	    				<label>Observaciones</label>
	    				<input id="observaciones" type="text" name="observaciones" class="form-control">
	    			</div>
	    			<div class="form-group">
	    				<label>Contraseña</label>
	    				<input id="password" type="password" name="password" class="form-control">
	    			</div>
	    			{!!link_to('/lector/show', $title='Registrar', $attributes = ['id'=>'btn_registrar','class'=>'btn btn-primary'], $secure = null)!!}
	    		{!!Form::close()!!}
	    	</div>
	    </div>
	</div>
@endsection
@section('scripts')
	<script src="{{asset('js/lector.js')}}"></script>
@endsection