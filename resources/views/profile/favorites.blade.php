@extends ('profile')

@section ('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}">
@endsection

@section ('content')

	<div class="container">
		<div class="row">
			<h4>
				Tus favoritos
			</h4>
		</div>

		<div class="row">	
			<div class="card content white">
				<div class="card-content">
					<h4>Materias</h4>
					<div class="collection">
						@foreach($signatures as $signature)

							<a href="{{ route('signature.show', $signature) }}" class="collection-item">
								<div class="row" style="margin-bottom: 0;">
									<div class="col-md-7">
										<h5>
											{{ $signature->name }}
										</h5>
									</div>
									<div class="icons col-md-5">
										<span class="mdi tooltipped" data-position="bottom" data-delay="50" data-tooltip="Comentarios">
											<i class="mdi-communication-messenger"></i> {{ count($signature->comments) }}
										</span>
										<span class="mdi tooltipped" data-position="bottom" data-delay="50" data-tooltip="Creditos">
											<i class="mdi-social-whatshot"></i>{{ count($signature->credits) }}
										</span>
										<span class="mdi tooltipped" data-position="bottom" data-delay="50" data-tooltip="Semestre">
											<i class="mdi-social-poll"></i> {{ $signature->semester }}
										</span>
										<span class="mdi tooltipped" data-position="bottom" data-delay="50" data-tooltip="Recursos">
											<i class="mdi-editor-attach-file"></i> {{ count($signature->resources) }}
										</span>
										<span class="mdi tooltipped" data-position="bottom" data-delay="50" data-tooltip="Asignaturas">
											<i class="mdi-social-school"></i> {{ count($signature->teachers) }}
										</span>
									</div>
								</div>
							</a>
						@endforeach
					</div>
				</div>
			</div>
		</div>

		<div class="row">	
			<div class="card content white">
				<div class="card-content">
					<h4>Maestros</h4>
					<div class="collection">
						@foreach($teachers as $teacher)

							<a href="{{ route('teacher.show', $teacher) }}" class="collection-item">
								<div class="row" style="margin-bottom: 0;">
									<div class="col-md-7">
										<h5>
											{{ $teacher->full_name }}
										</h5>
									</div>
									<div class="icons col-md-5">
										<span class="mdi tooltipped" data-position="bottom" data-delay="50" data-tooltip="Veces calificado">
											<i class="mdi-social-person"></i>{{ count($teacher->ratings) }}
										</span>
										<span class="mdi tooltipped" data-position="bottom" data-delay="50" data-tooltip="Calificación">
											<i class="mdi-action-grade"></i> {{ $teacher->rating }}
										</span>
										<span class="mdi tooltipped" data-position="bottom" data-delay="50" data-tooltip="Recursos">
											<i class="mdi-editor-attach-file"></i> {{ count($teacher->resources) }}
										</span>
										<span class="mdi tooltipped" data-position="bottom" data-delay="50" data-tooltip="Comentarios">
											<i class="mdi-communication-messenger"></i> {{ count($teacher->comments) }}
										</span>
										<span class="mdi tooltipped" data-position="bottom" data-delay="50" data-tooltip="Asignaturas">
											<i class="mdi-action-class"></i> {{ count($teacher->signatures) }}
										</span>
									</div>
								</div>
							</a>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection