<div class="row">
	<div class="input-field">
		{!! Form::text('name') !!}
		{!! Form::label('name', 'Nombre de la materia') !!}
	</div>

	<div class="input-field">
		{!! Form::textarea('description' ,null,  array('class' => 'materialize-textarea')) !!}
		{!! Form::label('description', 'descripcion') !!}
	</div>

	<div class="input-field">
		{!! Form::number('credits') !!}
		{!! Form::label('credits', 'creditos') !!}
	</div>

	<div class="input-field">
		{!! Form::number('semester') !!}
		{!! Form::label('semester', 'semestre') !!}
	</div>
</div>