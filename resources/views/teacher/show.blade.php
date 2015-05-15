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
	        		<i class="mdi-social-person"></i> {{count($teacher->ratings)}}
	        		<a style="display:none;" id="rating-a" data-id="{{ $teacher->id }}" href="{{ route('rating', ['variable', 'teacher']) }}"></a>
	        	</center>
	        </div>

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
																<a href="" class="pull-right"><i class="small mdi-file-file-download"></i></a>
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
							  				<a href="" class="pull-right">ver materia...</a>
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
	        										<a href="" class="pull-right"><i class="small mdi-file-file-download"></i></a>
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
		@foreach ($teacher->comments as $comment)
			<div class="card white">
			  	<div class="card-content row">
			    	<div class="col-md-6">
			    		{{ $comment->anonymous? $comment->user->user_name : 'anonimo'}}
			    	</div>
			    	<div class="col-md-6"><span class="pull-right"><i class="mdi-device-access-time"></i></span></div>
			    	<div class="col-md-12">
			    		<p>I am a very simple card. I am good at containing small bits of information.
			    		I am convenient because I require little markup to use effectively.</p>
			    	</div>
			  	</div>
			  	@if (!Auth::guest())
			  	@if (Auth::user()->id == $comment->user->id || Auth::user()->isLevel('admin'))
					<div class="card-action">
						<div class="actions">
							<a href="#" class="pull-right"><i class="mdi-content-create"></i></a>
							<a href='#' class="pull-right"><i class="mdi-action-delete"></i></a>
						</div>
					</div>
			  	@endif
			  	@endif
			</div>
		@endforeach
	</div>

@endsection



@section('scripts')
	<script type="text/javascript" src="{{ asset('js/teacher/show.js') }}"></script>
@endsection