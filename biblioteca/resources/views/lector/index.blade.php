@extends('plantillas.principal')
@section('title', 'BIBLIOTECA')
@section('estilos')
	<style type="text/css">
		img{
			margin: 0 auto;
		}
	</style>
@stop
@section('content')
	<div id="carousel" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
	    <li data-target="#carousel" data-slide-to="0" class="active"></li>
	    <li data-target="#carousel" data-slide-to="1"></li>
	    <li data-target="#carousel" data-slide-to="2"></li>
	    <li data-target="#carousel" data-slide-to="3"></li>
	  </ol>

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner">
	     <div class="item active">
	      <img src="/images/libro.jpg">
	      <div class="carousel-caption">
	      	<h3>Encuentra los mejores libros</h3>
	      </div>
	    </div>

	    <div class="item">
	      <img src="/images/autor.jpg">
	      <div class="carousel-caption">
	      	<h3>Encuentra los mejores autores</h3>
	      </div>
	    </div>

	    <div class="item">
	      <img src="/images/categoria.jpg">
	      <div class="carousel-caption">
	      	<h3>Busca tus libros por categoría</h3>
	      </div>
	    </div>

	    <div class="item">
	      <img src="/images/prestamo.jpg">
	      <div class="carousel-caption">
	      	<h3>Solicita tus prestamos facilmente</h3>
	      </div>
	    </div>
	  </div>

	  <!-- Controls -->
	  <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
	    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
	    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>
@stop