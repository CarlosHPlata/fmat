@extends ('app')

@section ('content')

	<div class="row card" style="padding-top:40px; overflow: visible;">
		<div class="col-md-12">
	
			{!! Form::model($resource, [ 'route' => ['resource.update', $resource], 'method' => 'PUT', 'files' => true]) !!}

				<div class="row">
					@include ('resource.partials.resourcefields')

					@include ('resource.partials.signaturesfields')

					@include ('resource.partials.teachersfields')
				</div>

				@if (isset($resource->path) && $resource->path != null && $resource->path != '')
					<div class="row card white" id="input">
						<div class="col-md-9">
							<a href="{{ asset('uploads/resources/'.$resource->path) }}" target="_blank">
								<i class="mdi-file-attachment"></i> {{ $resource->name }}
							</a>
						</div>
						<div class="col-md-3">
							<a href="#!" class="pull-right" id="removefile" data-id="{{ $resource->id }}"><i class="mdi-action-delete"></i></a>
						</div>
					</div>
				@else 
					<div class="file-field input-field">
				      	<input class="file-path validate" type="text"/>
					      <div class="btn">
				        	<span>File</span>
					        {!! Form::file('file') !!}
				      	</div>
				    </div>
				@endif

			    <div class="row">
			    	<div class="col-md-5 pull-right">
			    		<button class="btn waves-effect waves-light pull-right" type="submit" name="action">Guardar
			    		    <i class="mdi-content-send right"></i>
			    		 </button>
			    		<a href="{{ URL::previous() }}" class="waves-effect waves-light btn pull-right" style="margin-right: 20px;">Cancelar</a>
			    	</div>
			    </div>
				
			{!! Form::close() !!}
			
			@if (isset($resource->path) && $resource->path != null && $resource->path != '')
				<div style="display: none;">
					<a href="{{ route('resource.remove.file', $resource) }}" id="url"></a>
					{!!Form::open(['route' => ['resource.remove.file', $resource], 'method' => 'POST', 'id' => 'form-file'])!!}
					{!!Form::close()!!}
					<div id="file-input">
						<div class="file-field input-field">
					      	<input class="file-path validate" type="text"/>
						      <div class="btn">
					        	<span>File</span>
						        {!! Form::file('file') !!}
					      	</div>
					    </div>
					</div>
				</div>
			@endif

		</div>
	</div>

@endsection

@section ('scripts')

	<script type="text/javascript">
		$(document).ready(function() {
		    $('select').material_select();

		    $('#removefile').click(function(){
		    	var url = $('#url').attr('href');
		    	var data = $('#form-file').serialize();
		    	$.post(url, data, function(data){
		    		alert("Data: " + data + "");
		    	});
		    	alert(result);
		    });
		});
	</script>

@endsection