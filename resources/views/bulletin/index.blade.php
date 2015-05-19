@extends ('app')

@section ('content')
	
	@if (!Auth::guest())
	@if (Auth::user()->isLevel('admin'))
		<div class="card white">
			<div class="row">
				<div class="col-md-12" style="padding-top: 15px;">
					<a href="{{ route('bulletin.create') }}" class="waves-effect waves-light btn pull-right" style="width:100%;">Publicar nueva noticia</a>
				</div>
			</div>
		</div>
	@endif
	@endif	

	@foreach ($bulletins as $bulletin)
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
	@endforeach

@endsection