@extends('plantillas.principal')
@section('title','CATEGORIAS')
@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">Lista de categorias</div>
		<div class="panel-body">
			{!!Form::open(['class'=>'form-horizontal'])!!}
				<div class="form-group">
					<label for="categoria" class="col-sm-2 control-label">Categoria</label>
					<div class="col-sm-8">
						<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
						<input id="categoria" class="form-control" type="text" name="categoria" placeholder="Ingrese una categoría">
					</div>
				</div>
				<div class="form-group">
    				<div class="col-sm-offset-2 col-sm-10">
						{!!link_to('#', $title='Registrar', $attributes = ['id'=>'btn_registrar','class'=>'btn btn-primary'], $secure = null)!!}
					</div>
				</div>
			{!!Form::close()!!}
			<div class="row" style="background-color: grey; margin-bottom: 15px;"><div class="col-md-12"></div></div>
			<div class="table-responsive">
			    <table class="table table-bordered">
			    	<thead>
			    		<th>CATEGORIA</th>
			    		<th>OPERACIONES</th>
			    	</thead>
			    	<tbody id="lista_categorias">
			    	<tbody>
			    </table>
			</div>
		</div>
	</div>
	@extends('plantillas.modal')
	@section('modal_titulo','Edición de categorías')
	@section('modal_datos')
		<label for="categoria">Categoría</label>
		<input type="text" name="categoria_up" id="categoria_up" class="form-control">
	@endsection
@endsection
@section('scripts')
	<script src="{{asset('js/categoria.js')}}"></script>
@endsection