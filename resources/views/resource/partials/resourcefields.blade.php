		<div class="input-field">
			{!! Form::text('name') !!}
			{!! Form::label('name', 'nombre del recurso') !!}
		</div>

		<div class="input-field">
			{!! Form::textarea('description', null, ['class' => 'materialize-textarea']) !!}
			{!! Form::label('description') !!}
		</div>

		<div class="input-field">
			{!! Form::select('type', [
				'' 		=> 'seleccion un tipo', 
				'work' 	=> 'tarea', 
				'test' 	=> 'examen'
			]) !!}
			{!! Form::label('type', 'tipo de recurso') !!}
		</div>