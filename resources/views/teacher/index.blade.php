 @extends('app')

 @section('css')
	<link href="{{ asset('/css/teacher/index.css') }}" rel="stylesheet">
 @endsection

 @section('content')
 	@if (!Auth::guest())
 	@if (Auth::user()->isLevel('admin'))
 		<div class="row" style="margin-top:20px;">
 			<div class="col-md-12">
 				<a href="{{ route('teacher.create') }}" class="waves-effect waves-light btn pull-right" style="margin-right: 20px;">Crear</a>
 			</div>
 		</div>
 	@endif
 	@endif
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
  {!! (new App\MaterialPagination($teachers))->render() !!}

 @endsection
