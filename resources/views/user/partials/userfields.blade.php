<div class="input-field">
	{!! Form::text('user_name') !!}
	{!! Form::label('user_name', 'nombre de usuario') !!}
</div>
<div class="input-field">
	{!! Form::text('first_name') !!}
	{!! Form::label('first_name', 'nombre') !!}
</div>
<div class="input-field">
	{!! Form::text('last_name') !!}
	{!! Form::label('last_name', 'apellidos') !!}
</div>
<div class="input-field">
	{!! Form::email('email') !!}
	{!! Form::label('email', 'E-Mail') !!}
</div>
@if (!isset($user))
	<div class="input-field">
		{!! Form::password('password') !!}
		{!! Form::label('password', 'contraseña') !!}
	</div>
	<div class="input-field">
		{!! Form::password('password_confirmation') !!}
		{!! Form::label('password_confirmation', 'contraseña') !!}
	</div>
@endif

@if (!Auth::guest() && Auth::user()->isLevel('superadmin'))
	<div class="input-field">
		{!! Form::select('type', [
			'user' 	=> 'user', 
			'admin' => 'admin'
		]) !!}
		{!! Form::label('type', 'tipo de usuario') !!}
	</div>
@endif