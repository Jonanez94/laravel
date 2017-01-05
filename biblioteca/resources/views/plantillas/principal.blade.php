<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/estilos.css">
    @yield('estilos')	
</head>
<body>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      @if(Auth::check())
	      	<a class="navbar-brand" href="/inicio">BIBLIAPP</a>
	      @else
	      	<a class="navbar-brand" href="/">BIBLIAPP</a>
	      @endif
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      @if(Auth::check())
	      <ul class="nav navbar-nav">
	      	@if(Auth::user()->id == 1)
	        <li class="active"><a href="/lector/show">Lectores<span class="sr-only">(current)</span></a></li>
	        <li><a href="/libro">Libros</a></li>
	        @else
	        <li class="active"><a href="/libro">Libros<span class="sr-only">(current)</span></a></li>
	        @endif
	        <li><a href="/autor">Autores</a></li>
	        <li><a href="/categoria">Categorias</a></li>
	        <li><a href="/editorial">Editoriales</a></li>
	        <li><a href="/prestamo">Prestamos</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
	          	<span class="glyphicon glyphicon-user" aria-hidden="true"></span>  {!!Auth::user()->nombre!!}
	          </a>
	          <ul class="dropdown-menu">
	            <li><a href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>  Ajustes</a></li>
	            <li role="separator" class="divider"></li>
	            <li><a href="/logout"><span class="glyphicon glyphicon-off" aria-hidden="true"></span>  Cerrar sesión</a></li>
	          </ul>
	        </li>
	      </ul>
	      @endif 
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<div class="container">
		@yield('content')
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    @section('scripts')
    
    @show
</body>
<footer class="footer">
    <div class="container">
    	<p class="text-muted">© BIBLIAPP JONANEZ</p>
   	</div>
</footer>
</html>