@extends('app')

@section('content')
	
	<div class="row">
		{!! Form::open(array('route' => ['teacher.update', $teacher])) !!}
			
			<div class="input-field">
				{!! Form::text('first_name') !!}
				{!! Form::label('first_name', 'nombres') !!}
			</div>

			<div class="input-field">
				{!! Form::text('last_name') !!}
				{!! Form::label('last_name', 'apellidos') !!}
			</div>

		{!! Form::close() !!}
	</div>

@endsection