@extends('app')

@section('css')
	<link href="{{ asset('/css/teacher/show.css') }}" rel="stylesheet">
@endsection



@section('content')

	<div class="row teacher-view">
		<div class="col-md-12">
			<center>
	            <h3 class="media-heading"> {{ $teacher->title .' '. $teacher->full_name }} </h3>
	                <span class="mdi tooltipped" data-position="bottom" data-delay="50" data-tooltip="Veces calificado">
	                	<i class="mdi-action-done-all"></i>{{ count($teacher->ratings) }}
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
	        		<a href="{{}"></a>
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
	        	<h4>Materias</h4>
	        </div>
		</div>
	</div>

@endsection



@section('scripts')
	<script type="text/javascript" src="{{ asset('js/teacher/show.js') }}"></script>
@endsection