@extends('app')

@section('css')
	<link href="{{ asset('/css/teacher/show.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('/css/comments/comment.css') }}">
@endsection



@section('content')

	<div class="row teacher-view card">
		<div class="col-md-12">
			<center>
	            <h3 class="media-heading"> {{ $teacher->title .' '. $teacher->full_name }} </h3>
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
	        </center>
	            <hr>
	        <div class="row lead">
	        	<center>
	        		<div id="stars-existing" class="starrr" data-rating='{{ceil($teacher->rating)}}'></div>
	        		@if (!Auth::guest())
	        			<i class="mdi-social-person {{ count($teacher->ratings()->where('user_id', '=', Auth::user()->id)->get())>0? 'green-text text-lighten-3':'' }}"></i>
	        		@else
						<i class="mdi-social-person"></i>
	        		@endif 
	        		{{count($teacher->ratings)}}
	        		<a style="display:none;" id="rating-a" data-id="{{ $teacher->id }}" href="{{ route('rating', ['variable', 'teacher']) }}"></a>
	        	</center>
	        </div>


	        @if (!Auth::guest())
	        @if (Auth::user()->isLevel('admin'))
				<div class="row">
					<div class="col-md-12">
						<a href="{{ route('teacher.edit', $teacher) }}" class="btn-floating btn-small waves-effect waves-light teal accent-4" style="margin: 0px 48%;"><i class="mdi-content-create"></i></a>
					</div>
				</div>
	        @endif
	        @endif

	        <div class="row">
	        	<table class="table">
	        		<tbody>
	        			<tr>
	        				<th><center>E-Mail</center></th>
	        				<th><center> {{ $teacher->email }} </center></th>
	        			</tr>
	        			<tr>
	        				<th><center>Cubiculo</center></th>
	        				<th><center> {{ $teacher->cubicle }} </center></th>
	        			</tr>
	        			<tr>
	        				<th><center>Extension</center></th>
	        				<th> <center>{{ $teacher->extension }} </center></th>
	        			</tr>
	        		</tbody>
	        	</table>
	        </div>

            @if (!Auth::guest())
            @if (Auth::user()->isLevel('user'))
    			<div class="row">
    				<div class="col-md-12">
    					@if ( count( $teacher->favorites()->where('user_id', '=', Auth::user()->id)->get() ) > 0 )
							<span style="margin: 0px 48%"><i style="color:#ee6e73;" class="small mdi-action-favorite"></i></span>
    					@else
    						<a href="{{ route('favorite.teacher', $teacher) }}" style="margin: 0px 48%;"><i style="color:#ee6e73;" class="small mdi-action-favorite-outline"></i></a>
    					@endif
    				</div>
    			</div>
            @endif
            @endif
	        
	        <hr>
	        <div class="row">
	        	<h4>Materias impartidas este semestre</h4>
	        	<div class="col-md-12">
		            <ul class="collapsible" data-collapsible="expandable">
		            	@foreach ($teacher->signatures as $signature)
							<li class="">
							  	<div class="collapsible-header"><i class="mdi-action-class"></i> {{ $signature->name }} </div>
							  	<div class="collapsible-body" style="display: none;">
							  		@if (count($teacher->getSignaturesResources($signature)) > 0)
							  		<table class="table">
							  			<thead>
							  				<th>Recursos</th>
							  			</thead>
							  			<tbody>
							  				@foreach ($teacher->getSignaturesResources($signature) as $resource)
												<tr>
													<td>
														<i class="{{ $resource->type == 'work'?'mdi-action-receipt':'mdi-action-description' }} tooltipped" data-position="bottom" data-delay="50" data-tooltip="{{ $resource->type == 'work'?'tarea':'examen' }}"></i> 
														{{$resource->name}}
														<div>
															{{ $resource->description }}
														</div>
														@if ($resource->path)
															<div >
																<a href="{{ asset('uploads/resources/'.$resource->path) }}" target="_blank" class="pull-right"><i class="small mdi-file-file-download"></i></a>
															</div>
														@endif														
													</td>
												</tr>
							  				@endforeach
							  			</tbody>
							  		</table>
							  		<hr>
							  		@endif

							  		<div class="row" style="padding-top:20px;">
							  			<div class="col-md-12">
							  				<a href="{{ route('signature.show', $signature) }}" class="pull-right">ver materia...</a>
							  			</div>
							  		</div>
							  	</div>
							</li>
		            	@endforeach
		            </ul>
	          	</div>
	        </div>

	        <div class="row resources">
	        	<h4>Todos los recursos historicos</h4>
    	  		<table class="table">
    	  			<thead>
    	  				<th>Recursos</th>
    	  			</thead>
    	  			<tbody>
    	  				@foreach ($teacher->resources as $resource)
    						<tr>
    							<td>
    								<div>
    									<i class="{{ $resource->type == 'work'?'mdi-action-receipt':'mdi-action-description' }} tooltipped" data-position="bottom" data-delay="50" data-tooltip="{{ $resource->type == 'work'?'tarea':'examen' }}"></i> 
    									{{$resource->name}}
    									<span class="pull-right"> <i class="mdi-action-class"></i> {{ $resource->signature->name }} </span>
    								</div>
    								<div>
    									{{ $resource->description }}
    								</div>
    								@if ($resource->path)
    									<div >
    										<a href="{{ asset('uploads/resources/'.$resource->path) }}" target="_blank" class="pull-right"><i class="small mdi-file-file-download"></i></a>
    									</div>
    								@endif														
    							</td>
    						</tr>
    	  				@endforeach
    	  			</tbody>
    	  		</table>
	        </div>
		</div>
	</div>

	<div class="row comments" id="comments">
		<span class="brown-text text-lighten-1">Comentarios</span>

		@include('comments.partials.commentform')
		<input type="hidden" id="type" value="App\Teacher">
		<input type="hidden" id="id" value="{{ $teacher->id }}">

		@foreach ($teacher->comments()->orderBy('created_at', 'DESC')->get() as $comment)
			@include('comments.partials.commentaries')
		@endforeach
	</div>

@endsection



@section('scripts')
	<script type="text/javascript" src="{{ asset('js/teacher/show.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/comments/jquery.timeago.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/comments/comment.js') }}"></script>
	<script type="text/javascript">
		$(function(){
			jQuery("abbr.timeago").timeago();
		});
	</script>
@endsection