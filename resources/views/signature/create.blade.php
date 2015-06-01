@extends('app')

@section('css')
	<link rel="stylesheet" href="{{ asset('css/teacher/signatures.css') }}">
@endsection

@section('content')

	<div class="row card" style="padding-top:40px; overflow: visible;">
		<div class="col-md-12">
			@include ('errors')
			{!! Form::open(array('route' => 'signature.store', 'method' => 'post')) !!}
				
				<h4>Informació basica</h4>
				@include ('signature.partials.signaturefields')

				<hr>
				<h4>Maestros</h4>
				@include ('signature.partials.teachersfields')

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
		    $('#multiple-select-box').selectivity();
		});
	</script>
@endsection