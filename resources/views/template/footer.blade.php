	<footer class="page-footer brown lighten-4">
      	<div class="container">
        	<div class="row">
          		<div class="col l6 s12">
            		<h5 class="brown-text text-lighten-1">LIS FMAT WIKI</h5>
            		<p class="teal-text text-lighten-2">Un lugar para compartir recursos de estudio</p>
          		</div>
          		<div class="col l4 offset-l2 s12">
            		<h5 class="brown-text text-lighten-1">Links</h5>
            		<ul>
              			<li><a class="teal-text text-lighten-2" href="{{route('teacher.index')}}">Maestros</a></li>
              			<li><a class="teal-text text-lighten-2" href="{{route('signature.index')}}">Materias</a></li>
              			<li><a class="teal-text text-lighten-2" href="{{route('bulletin.index')}}">Noticias</a></li>
                    @if (!Auth::guest() && Auth::user()->isLevel('admin'))
              			<li><a class="teal-text text-lighten-2" href="{{route('user.index')}}">Usuarios</a></li>
                    @endif
            		</ul>
          		</div>
        	</div>
      	</div>
	    <div class="footer-copyright">
	        <div class="container">
            	© 2015 Copyright
        	</div>
        </div>
    </footer>

    <div style="display:none;">
      @if (Session::has('message'))
        <input type="hidden" class="toast" value="{{ Session::get('message') }}">
      @endif
    </div>