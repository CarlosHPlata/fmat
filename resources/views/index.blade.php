@extends('app')

@section('content')
	<div class="card blue-grey darken-1">
	  <div class="card-content white-text">
	    	<span class="card-title">Bienvenido a LisFmat Wiki</span>
	    	<p>Un espacio para compartir opiniones y materiales de estudio, relacionados a las clases que
	    	se imparten en la carrera LIS de Fmat.</p>
	  </div>

	  <div class="card-action">
	  		@if (Auth::guest())
	    		<a href="#">Registrate</a>
	    		<a href="#">Inicia sesión</a>
	    	@else

	    	@endif
	  </div>
	</div>

	<div class="card white">
		<div class="card-content">
			<span class="card-title brown-text text-lighten-1">Nuevo Semestre por venir</span>
			<p>
				Pronto vendra el nuevo semestre y se actualizara el contenido de la pagina, los ratings de los maestros
				seran reseteados para ser votados nuevamente.
			</p>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="card white">
				<div class="card-content">
					<span class="card-title brown-text text-lighten-1">Maestros mejor votados</span>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis atque sequi unde eum nobis dolorem reprehenderit, sunt, est corrupti itaque delectus tempora labore corporis nihil rerum obcaecati, excepturi minima consectetur!
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card white">
				<div class="card-content">
					<span class="card-title brown-text text-lighten-1">Materias con mas recursos</span>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat magni, incidunt quia commodi architecto amet eligendi voluptatem nostrum ab aliquam fuga provident non alias accusantium corrupti ullam libero laboriosam harum.
					</p>
				</div>
			</div>
		</div>
	</div>
@endsection