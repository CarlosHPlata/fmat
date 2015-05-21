 @extends('app')

 @section('css')
	<link href="{{ asset('/css/teacher/index.css') }}" rel="stylesheet">
 @endsection

 @section('content')

	@if (!Auth::guest())
	@if (Auth::user()->isLevel('admin'))
		<div class="row" style="margin-top:20px;">
			<div class="col-md-12">
				<a href="{{ route('signature.create') }}" class="waves-effect waves-light btn pull-right" style="margin-right: 20px;">Crear</a>
			</div>
		</div>
	@endif
	@endif

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
  {!! (new App\MaterialPagination($signatures))->render() !!}

 @endsection
