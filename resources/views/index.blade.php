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

	<div class="card white">
		<div class="card-content">
			<span class="card-title brown-text text-lighten-1">Nuevo Semestre por venir</span>
			<p>
				Pronto vendra el nuevo semestre y se actualizara el contenido de la pagina, los ratings de los maestros
				seran reseteados para ser votados nuevamente.
			</p>
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
						<ul class="collection">
						    <a class="collection-item" href=""> 
						    	<div> 
						    		Alvin
						    		<span href="#!" class="secondary-content">
						    			5<i class="mdi-action-grade"></i>
						    		</span>
						    	</div> 
						    </a>
						    <a class="collection-item" href=""> 
						    	<div> 
						    		Alvin
						    		<span href="#!" class="secondary-content">
						    			5<i class="mdi-action-grade"></i>
						    		</span>
						    	</div> 
						    </a>
						    <a class="collection-item" href=""> 
						    	<div> 
						    		Alvin
						    		<span href="#!" class="secondary-content">
						    			5<i class="mdi-action-grade"></i>
						    		</span>
						    	</div> 
						    </a>
						</ul>
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card white">
				<div class="card-content">
					<span class="card-title brown-text text-lighten-1">Materias con mas recursos</span>
					<p>
						<ul class="collection">
						    <a class="collection-item" href=""> 
						    	<div> 
						    		Alvin
						    		<span href="#!" class="secondary-content">
						    			5<i class="mdi-editor-attach-file"></i>
						    		</span>
						    	</div> 
						    </a>
						    <a class="collection-item" href=""> 
						    	<div> 
						    		Alvin
						    		<span href="#!" class="secondary-content">
						    			5<i class="mdi-editor-attach-file"></i>
						    		</span>
						    	</div> 
						    </a>
						    <a class="collection-item" href=""> 
						    	<div> 
						    		Alvin
						    		<span href="#!" class="secondary-content">
						    			5<i class="mdi-editor-attach-file"></i>
						    		</span>
						    	</div> 
						    </a>
						</ul>
					</p>
				</div>
			</div>
		</div>
	</div>
@endsection