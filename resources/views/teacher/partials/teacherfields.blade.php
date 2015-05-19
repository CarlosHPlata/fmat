<div class="row">
	<div class="row">
		<div class="col-md-3">
			<div class="input-field">
				{!! Form::text('title') !!}
				{!! Form::label('title', 'titulo de grado') !!}
			</div>
		</div>
		<div class="col-md-9">
			<div class="input-field">
				{!! Form::text('first_name') !!}
				{!! Form::label('first_name', 'nombres') !!}
			</div>
		</div>
	</div>

	<div class="input-field">
		{!! Form::text('last_name') !!}
		{!! Form::label('last_name', 'apellidos') !!}
	</div>

	<div class="input-field">
		{!! Form::email('email') !!}
		{!! Form::label('email', 'E-Mail') !!}
	</div>

	<div class="input-field">
		{!! Form::text('cubicle') !!}
		{!! Form::label('cubicle', 'cubiculo') !!}
	</div>

	<div class="input-field">
		{!! Form::text('extension') !!}
		{!! Form::label('extension', 'extension') !!}
	</div>
</div>
