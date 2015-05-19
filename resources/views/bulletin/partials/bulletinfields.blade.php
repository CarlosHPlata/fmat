<div class="row">
	<div class="input-field">
		{!! Form::text('title') !!}
		{!! Form::label('title', 'titulo') !!}
	</div>

	<div class="input-field">
		{!! Form::textarea('content', null, array('class' => 'materialize-textarea')) !!}
		{!! Form::label('content', 'contenido') !!}
	</div>

	<div class="input-field">
		{!! Form::date('date', null, ['class' => 'datepicker']) !!}		
		{!! Form::label('date', 'fecha de publicacion') !!}
	</div>
</div>