@extends ('app')

@section ('content')

	<div class="row card" style="padding-top:40px; overflow: visible;">
		<div class="col-md-12">
	
			{!! Form::open([ 'route' => 'resource.store', 'method' => 'POST', 'files' => true]) !!}

				<div class="row">
					@include ('resource.partials.resourcefields')

					@include ('resource.partials.signaturesfields')

					@include ('resource.partials.teachersfields')
				</div>

				<div class="file-field input-field">
			      	<input class="file-path validate" type="text"/>
				      <div class="btn">
			        	<span>File</span>
				        {!! Form::file('file') !!}
			      	</div>
			    </div>

			    <div class="row">
			    	<div class="col-md-5 pull-right">
			    		<button class="btn waves-effect waves-light pull-right" type="submit" name="action">Guardar
			    		    <i class="mdi-content-send right"></i>
			    		 </button>
			    		<a href="{{ URL::previous() }}" class="waves-effect waves-light btn pull-right" style="margin-right: 20px;">Cancelar</a>
			    	</div>
			    </div>
				
			{!! Form::close() !!}
		</div>
	</div>

@endsection

@section ('scripts')

	<script type="text/javascript">
		$(document).ready(function() {
		    $('select').material_select();
		});
	</script>

@endsection