@extends('app')

@section('content')
	
	<div class="row card" style="padding-top:40px;">
		<div class="col-md-12">
			{!! Form::open( array('route' => ['teacher.update', $teacher])) !!}
				@include ('teacher.partials.teacherfields')
				<div class="row">
					<div class="col-md-5 pull-right">
						<button class="btn waves-effect waves-light pull-right" type="submit" name="action">Guardar
						    <i class="mdi-content-send right"></i>
						 </button>
						<a class="waves-effect waves-light btn pull-right" style="margin-right: 20px;">Cancelar</a>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>

@endsection