@extends('app')

@section('css')
	<link href="{{ asset('/css/teacher/show.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('/css/comments/comment.css') }}">
@endsection



@section('content')

	<div class="row teacher-view card">
		<div class="col-md-12">
			<center>
	            <h3 class="media-heading"> {{ $signature->name }} </h3>
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
	        </center>
	            <hr>

	        @if (!Auth::guest())
	        @if (Auth::user()->isLevel('admin'))
				<div class="row">
					<div class="col-md-12">
						<a href="{{ route('signature.edit', $signature) }}" class="btn-floating btn-small waves-effect waves-light teal accent-4" style="margin: 0px 48%;"><i class="mdi-content-create"></i></a>
					</div>
				</div>
	        @endif
	        @endif

	        @if (!Auth::guest())
            @if (Auth::user()->isLevel('user'))
    			<div class="row">
    				<div class="col-md-12">
    					@if ( count( $signature->favorites()->where('user_id', '=', Auth::user()->id)->get() ) > 0 )
							<span style="margin: 0px 48%"><i style="color:#ee6e73;" class="small mdi-action-favorite"></i></span>
    					@else
    						<a href="{{ route('favorite.signature', $signature) }}" style="margin: 0px 48%;"><i style="color:#ee6e73;" class="small mdi-action-favorite-outline"></i></a>
    					@endif
    				</div>
    			</div>
            @endif
            @endif

	        <div class="row">
	        	<div class="col-md-12">
	        		{{ $signature->description }}
	        	</div>
	        </div>
	        
	        <hr>
	        <div class="row">
	        	<h4>Maestros que imparten esta materia este semestre</h4>
	        	<div class="col-md-12">
		            <ul class="collapsible" data-collapsible="expandable">
		            	@foreach ($signature->teachers as $teacher)
							<li class="">
							  	<div class="collapsible-header"><i class="mdi-action-class"></i> {{ $teacher->full_name }} </div>
							  	<div class="collapsible-body" style="display: none;">
							  		@if (count($signature->getTeacherResources($teacher)) > 0)
							  		<table class="table">
							  			<thead>
							  				<th>Recursos</th>
							  			</thead>
							  			<tbody>
							  				@foreach ($signature->getTeacherResources($teacher) as $resource)
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
							  				<a href="{{ route('teacher.show', $teacher) }}" class="pull-right">ver maestro...</a>
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
    	  				@foreach ($signature->resources as $resource)
    						<tr>
    							<td>
    								<div>
    									<i class="{{ $resource->type == 'work'?'mdi-action-receipt':'mdi-action-description' }} tooltipped" data-position="bottom" data-delay="50" data-tooltip="{{ $resource->type == 'work'?'tarea':'examen' }}"></i> 
    									{{$resource->name}}
    									<span class="pull-right"> <i class="mdi-social-school"></i> {{ $resource->teacher->full_name }} </span>
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

		@foreach ($signature->comments()->orderBy('created_at', 'DESC')->get() as $comment)
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