@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<div class="input-field col-md-10 col-md-offset-1">
								{!! Form::text('email', old('email')) !!}
								{!! Form::label('email', 'User Name or E-Mail Address') !!}
							</div>
						</div>

						<div class="form-group">
							<div class="input-field col-md-10 col-md-offset-1">
								{!! Form::password('password') !!}
								{!! Form::label('password', 'Password') !!}
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-10 col-md-offset-1">
								<div class="checkbox">
									<input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" name="remember" />
									<label for="filled-in-box">Remember Me</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-10 col-md-offset-1">
								<button type="submit" class="btn btn-primary">Login</button>

								<a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
								<a class="btn btn-link pull-right" href="{{ route('user.create') }}">Registrate</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
