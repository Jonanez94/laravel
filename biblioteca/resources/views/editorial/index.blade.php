@extends('plantillas.principal')
@section('title','EDITORIALES')
@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">Lista de editoriales</div>
		<div class="panel-body">
			{!!Form::open(['class'=>'form-horizontal'])!!}
				<div class="form-group">
					<label for="editorial" class="col-sm-2 control-label">Editorial</label>
					<div class="col-sm-8">
						<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
						<input id="editorial" class="form-control" type="text" name="editorial" placeholder="Ingrese una editorial">
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
			    		<th>EDITORIAL</th>
			    		<th>OPERACIONES</th>
			    	</thead>
			    	<tbody id="lista_editoriales">
			    	<tbody>
			    </table>
			</div>
		</div>
	</div>
	@extends('plantillas.modal')
	@section('modal_titulo','Edición de editoriales')
	@section('modal_datos')
		<label for="editorial">Editorial</label>
		<input type="text" name="editorial_up" id="editorial_up" class="form-control">
	@endsection
@endsection
@section('scripts')
	<script src="{{asset('js/editorial.js')}}"></script>
@endsection