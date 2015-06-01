@extends ('profile')

@section ('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/comments/comment.css') }}">
@endsection

@section ('content')

	<div class="container">
		<div class="row">
			<h4>
				Tus reportes
			</h4>
		</div>

		@foreach ($user->reports as $report)

			<div class="card white">
			  	<div class="card-content row">
			  		<div class="comment-header">
			  			<div class="col-md-6">
			  				{{ $report->admin->user_name }}
			  			</div>
			  		</div>
			    	<div class="col-md-12">
			    		<p> {{ $report->reason }} </p>
			    	</div>
			  	</div>
			</div>

		@endforeach

	</div>

@endsection