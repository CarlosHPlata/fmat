@extends ('profile')

@section ('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}">
@endsection

@section ('content')

	<div class="container">
		<div class="row">	
			<div class="card content white">
				<div class="card-content">
					<h4>Tus recursos</h4>
					<a href="{{ route('resource.create') }}" class="waves-effect waves-light btn"><i class="mdi-file-cloud left"></i>Compartir Recurso</a>
	    	  		<table class="table">
	    	  			<thead>
	    	  				<th>Recursos</th>
	    	  			</thead>
	    	  			<tbody>
	    	  				@foreach ($user->resources as $resource)
	    						<tr>
	    							<td>
	    								<div>
	    									<i class="{{ $resource->type == 'work'?'mdi-action-receipt':'mdi-action-description' }} tooltipped" data-position="bottom" data-delay="50" data-tooltip="{{ $resource->type == 'work'?'tarea':'examen' }}"></i> 
	    									{{$resource->name}}
	    									<span class="pull-right"> <a href="{{ route('signature.show', $resource->signature) }}"><i class="mdi-action-class"></i> </a></span>
	    									<span class="pull-right"> <a href="{{ route('teacher.show', $resource->teacher) }}"><i class="mdi-social-school"></i> </a></span>
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
	</div>

@endsection