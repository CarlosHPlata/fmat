@extends('app')

@section('css')
	<link rel="stylesheet" href="{{ asset('css/teacher/signatures.css') }}">
@endsection

@section('content')
	
	<div class="row card" style="padding-top:40px; overflow: visible;">
		<div class="col-md-12">
			@include ('errors')
			{!! Form::model($teacher, array('route' => ['teacher.update', $teacher], 'method' => 'put')) !!}
				
				<h4>Informació basica</h4>
				@include ('teacher.partials.teacherfields')

				<hr>
				<h4>Materias</h4>
				@include ('teacher.partials.signaturesfields')

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

	<div class="row card" style="padding-top:40px; overflow: visible;">
		<div class="col-md-12">
			<h4>Otras opciones</h4>
			{!! Form::open(['route' => ['teacher.destroy', $teacher], 'method' => 'DELETE']) !!}
				<button class="btn waves-effect waves-light" type="submit" name="action" style="margin:20px;">Eliminar
				    <i class="mdi-action-delete right"></i>
				 </button>
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