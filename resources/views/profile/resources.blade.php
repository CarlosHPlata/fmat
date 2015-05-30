@extends ('profile')

@section ('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}">
@endsection

@section ('content')

	<div class="row">
		<div class="card grey darken-3">
		  <div class="card-content white-text">
		    	<div class="container">
		    		<div class="row">
		    			<div class="col-md-8">
		    				<h2 class="user-name teal-text text-accent-3">{{ $user->user_name }}</h2>
		    				<a href="" class="btn">Editar</a>
		    			</div>
		    			<div class="col-md-4">
		    				<h2 class="points teal-text text-accent-3">75</h2>
		    				<p class="exp">Experiencia</p>
		    			</div>
		    		</div>
		    	</div>
		  </div>

		  <div class="card-action grey darken-4">
		    	<div class="container">
		    		<div class="row links">
		    			<div class="col-md-4 pull-right">
		    				<a href="" class="white-text"><i class="mdi-editor-attach-file"></i> Aportaciones</a>
		    				<a href="" class="white-text"><i class="mdi-action-favorite"></i> Favoritos</a>
		    				<a href="" class="white-text"><i class="mdi-content-flag"></i> Reportes</a>
		    			</div>
		    		</div>
		    	</div>
		  </div>
		</div>
	</div>

	<div class="container">
		<div class="row">	
			<div class="card content white">
				<div class="card-content">
					<table class="table">
						<thead>
							<th>Actividad</th>
							<th>Fecha</th>
							<th>Ir</th>
						</thead>

						<tbody>
							@foreach ($user->logs as $log)
								<tr>
									<td>{{ $log->text }}</td>
									<td>{{ $log->updated_at }}</td>
									<td>
										@if ($log->is_link_valid && $log->action != 'delete')
											<a href="{{ $log->link }}"><i class="mdi-content-link"></i></a>
										@endif
									</td>
								</tr>
							@endforeach
						</tbody>

					</table>
				</div>
			</div>
		</div>
	</div>

@endsection