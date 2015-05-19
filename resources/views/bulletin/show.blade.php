@extends ('app')

@section('css')
	<link href="{{ asset('/css/teacher/show.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('/css/comments/comment.css') }}">
@endsection

@section ('content')

	<div class="row">
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
					<a href="{{ route('bulletin.edit', $bulletin) }}" class="btn-floating btn-small waves-effect waves-light teal accent-4" style="margin: 0px 48%;"><i class="mdi-content-create"></i></a>
				</div>
			</div>
		</div>	
	</div>

	<div class="row comments" id="comments">
		<span class="brown-text text-lighten-1">Comentarios</span>

		@include('comments.partials.commentform')

		@foreach ($bulletin->comments()->orderBy('created_at', 'DESC')->get() as $comment)
			@include('comments.partials.commentaries')
		@endforeach
	</div>


@endsection 

@section('scripts')
	<script type="text/javascript" src="{{ asset('js/teacher/show.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/comments/jquery.timeago.js') }}"></script>
	<script type="text/javascript">
		$(function(){
			jQuery("abbr.timeago").timeago();
		});
	</script>
@endsection