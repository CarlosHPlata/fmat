@extends('app')

@section('content')
	<h3>Noticias</h3>
	@forelse ($bulletines as $bulletin)
		<div class="card white">
			<div class="card-content">
				<span class="card-title brown-text text-lighten-1">{{ $bulletin->title }}</span>
				<p>
					{{ $bulletin->content }}
				</p>
				<span class="card-date">{{ $bulletin->date }}</span>
			</div>
			<div class="card-action" style="padding:10px">
				<div class="row" style="margin-bottom: 0">
					<div class="col-md-6">
						<a href="{{ route('bulletin.show', $bulletin) }}">Ver mas...</a>
					</div>
					<div class="col-md-6">
						<span class="pull-right">{{ count($bulletin->comments) }} <i class="mdi-editor-mode-comment"></i></span>
					</div>
				</div>
			</div>
		</div>
		@empty
		<div class="card-panel">
				<p class="flow-text">No results</p>
		</div>
	@endforelse
	<hr>
	<h3>Maestros</h3>
	<div class="collection">
		@forelse($teachers as $teacher)

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
			@empty
			<div class="card-panel">
				<p class="flow-text">No results</p>
			</div>
		@endforelse
	</div>
	<hr>
	<h3>Materias</h3>
	<div class="collection">
		@forelse($signatures as $signature)

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
			@empty
			<div class="card-panel">
				<p class="flow-text">No results</p>
			</div>
		@endforelse
	</div>
	<hr>
	<h3>Recursos</h3>
	<div class="collection">
		@forelse($resources as $resource)
			<a href="#" class="collection-item">
				<div class="row" style="margin-bottom: 0;">
					<div class="col-md-12">
						<h5>
							{{ $resource->name }}
						</h5>
						<p>{{ $resource->description }}</p>
					</div>
				</div>
			</a>
			@empty
			<div class="card-panel">
				<p class="flow-text">No results</p>
			</div>
		@endforelse
	</div>

@endsection