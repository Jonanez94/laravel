@extends('plantillas.principal')
@section('title', 'BIBLIOTECA')
@section('estilos')
	<link rel="stylesheet" type="text/css" href="/css/estilos.css">
	<link rel="stylesheet" type="text/css" href="/css/login.css">
@stop
@section('content')
	<div class="card card-container">
        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
        <p id="profile-name" class="profile-name-card"></p>
        @include('alerts.errors')
        {!!Form::open(['route'=>'log.store', 'method'=>'POST'])!!}
			<div class="form-group">	
				{!!Form::email('correo',null,['class'=>'form-control', 'placeholder'=>'Ingrese su correo'])!!}
			</div>
			<div class="form-group">
				{!!Form::password('password',['class'=>'form-control', 'placeholder'=>'Ingrese su contraseña'])!!}
			</div>
			{!!Form::submit('Iniciar sesión',['class'=>'btn btn-primary btn-lg btn-block'])!!}
		{!!Form::close()!!}
    </div>
@stop