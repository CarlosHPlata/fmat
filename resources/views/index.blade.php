@extends('app')

@section('content')
	<div class="card background programmer">
	  <div class="card-content white-text">
	    	<span class="card-title">Bienvenido a LisFmat Wiki</span>
	    	<p>Un espacio para compartir opiniones y materiales de estudio, relacionados a las clases que
	    	se imparten en la carrera LIS de Fmat.
	    	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima ullam explicabo minus debitis dicta possimus itaque, perferendis, consectetur reiciendis praesentium sapiente unde sunt repellendus odit incidunt perspiciatis facilis? Molestiae, officia.</p>
	    	<p>
	    		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum laboriosam, cumque maiores cum officiis natus. Quaerat sapiente maiores deleniti, suscipit repellendus magnam. Repellendus dicta, ratione itaque, placeat hic aliquam expedita.
	    	</p>
	  </div>

	  <div class="card-action">
	  		@if (Auth::guest())
	    		<a href="#">Registrate</a>
	    		<a href="#">Inicia sesión</a>
	    	@else

	    	@endif
	  </div>
	</div>

	<section>
		<div class="card white">
			<div class="card-content">
				aqui el calendario
			</div>
		</div>
	</section>

	<section>
		<hr>
		<h4>Noticias</h4>

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
							<a href="{{route('bulletin.show', $bulletin->id )}}">Ver mas...</a>
						</div>
						<div class="col-md-6">
							<span class="pull-right">{{ count($bulletin->comments) }} <i class="mdi-editor-mode-comment"></i></span>
						</div>
					</div>
				</div>
			</div>
		@endforeach

		<div>
			<span class="pull-right"><a href="{{route('bulletin.index')}}">Ver mas</a></span> <br>
			<hr>
		</div>
	</section>



	<div class="row">
		<div class="col-md-6">
			<div class="card white">
				<div class="card-content">
					<span class="card-title brown-text text-lighten-1">TOP 10 Maestros mejor votados</span>
					<p>
						<ul class="collection">
							@foreach ($teachers as $teacher)
								<a class="collection-item" href="{{ route('teacher.show', $teacher) }}">
									<div>
										{{ $teacher->full_name }}
										<span class="secondary-content">
											{{$teacher->rating}}<i class="mdi-action-grade"></i>
										</span>
									</div>
								</a>
							@endforeach
						</ul>
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card white">
				<div class="card-content">
					<span class="card-title brown-text text-lighten-1">TOP 10 Materias con mas recursos</span>
					<p>
						<ul class="collection">
							@foreach ($signatures as $signature)
								<a class="collection-item" href="{{ route('signature.show', $signature) }}">
									<div>
										{{ $signature->name }}
										<span href="#!" class="secondary-content">
										 	{{ count($signature->resources) }}<i class="mdi-editor-attach-file"></i>
										</span>
									</div>
								</a>
							@endforeach
						</ul>
					</p>
				</div>
			</div>
		</div>
	</div>
@endsection
