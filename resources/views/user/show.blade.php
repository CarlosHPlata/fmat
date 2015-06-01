@extends ('app')

@section ('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}">
@endsection

@section ('content')
		<div class="row">
			<div class="card content white">
				<div class="card-content">
					<h1>{{$user->user_name}}</h1>
					<h4>{{$user->type}}</h4>
					<hr>
					<table class="table">
						<tbody>
							<tr>
								<td>Nombre</td>
								<td>{{ $user->first_name }}</td>
							</tr>
							<tr>
								<td>Nombre</td>
								<td>{{ $user->last_name }}</td>
							</tr>
							<tr>
								<td>E-Mail</td>
								<td>{{ $user->email }}</td>
							</tr>
						</tbody>
					</table>
					<div style="font-size: 13pt;   text-align: center;">
						<a class="btn-floating waves-effect waves-light teal accent-4" href="{{ route('user.edit', $user) }}"><i class="mdi-editor-mode-edit"></i></a>
						<a class="btn-floating waves-effect waves-light yellow darken-3 modal-trigger" href="#modal1"><i class="mdi-content-flag"></i></a>
						<a class="btn-floating waves-effect waves-light red" href=""><i class="mdi-content-report"></i></a>
					</div>
				</div>
			</div>
		</div>
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

		  <!-- Modal Structure -->
		  <input type="hidden" id="url" value="">
		  <div id="modal1" class="modal">
		    <div class="modal-content">
		      <h4>Reporte</h4>
		      <p>
		          Los reportes advierten a un usuario de un mal comportamiento, muchos reportes acumulados pueden terminar en un baneo del sistema
		      </p>
		      {!! Form::open(['route' => ['report', $user], 'method' => 'POST', 'id' => 'form-report']) !!}
		        <div class="input-field">
		            {!! Form::textarea('reason' ,null,  array('class' => 'materialize-textarea', 'length' => '255', 'id' => 'razon')) !!}
		            {!! Form::label('reason', 'Razon del reporte') !!}
		        </div>
		        <div class="input-field">
		        	<button class="btn waves-effect waves-light pull-right" type="submit" name="action">reportar
		        	    <i class="mdi-content-send right"></i>
		        	 </button>
		        </div>
		      {!! Form::close() !!}
		    </div>
		  </div>

@endsection

@section ('scripts')
	<script type="text/javascript">
		$(document).ready(function(){
		    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
		    $('.modal-trigger').leanModal();
		  });
	</script>
@endsection
