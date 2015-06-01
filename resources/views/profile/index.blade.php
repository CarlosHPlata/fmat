@extends ('profile')

@section ('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}">
@endsection

@section ('content')

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
									<td>{!! $log->text !!}</td>
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

@section ('scripts')
	<script type="text/javascript">
		$('.modal-trigger').click(function(){
			$('#reason').val('este es un comentario');
			$('#url').val($(this).attr('data-route'));
			$('#modal1').openModal();
		});
	</script>
@endsection