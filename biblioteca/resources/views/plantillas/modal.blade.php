<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modal">
	<div class="modal-dialog" role="document">
	   	<div class="modal-content">
	   		<div class="modal-header">
	       		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	       		<h4 class="modal-title" id="modal">@yield('modal_titulo')</h4>
	   		</div>
	     	<div class="modal-body">
	      		<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
	      		@yield('modal_datos')
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	        	<button id="btn_actualizar" type="button" class="btn btn-primary" value="">Actualizar datos</button>
		       </div>
	    </div>
	</div>
</div>