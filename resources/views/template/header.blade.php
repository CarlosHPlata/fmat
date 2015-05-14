<div class="navbar-fixed">
    <nav class="white">
      <div class="nav-wrapper">
        <a href="{{ url('/') }}" class="brand-logo teal-text text-accent-4">Logo</a>
		    <a href="#" data-activates="mobile-demo" class="button-collapse teal-text text-lighten-1"><i class="mdi-navigation-menu"></i></a>

        <ul class="right hide-on-med-and-down">
          <li><a href="#" class="teal-text text-lighten-1">Materias</a></li>
         	<li><a href="{{ route('teacher.index') }}" class="teal-text text-lighten-1">Maestros</a></li>
          <li><a href="#" class="teal-text text-lighten-1">Noticias</a></li>
          <li class="find">
            <form>
                <div class="input-field">
                    <input id="search" type="search" class="" required>
                    <label for="search"><i class="mdi-action-search teal-text text-lighten-1"></i></label>
                    <i class="mdi-navigation-close"></i>
                </div>
            </form>
          </li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="sass.html" class="teal-text text-accent-4" >Materias</a></li>
          	<li><a href="{{ route('teacher.index') }}" class="teal-text text-accent-4" >Maestros</a></li>
            <li><a href="#" class="teal-text text-accent-4" >Noticias</a></li>
          	<li>
          		<form>
          		    <div class="input-field">
          		        <input id="search" type="search" required>
          		        <label for="search"><i class="mdi-action-search teal-text text-accent-4"></i></label>
          		        <i class="mdi-navigation-close"></i>
          		    </div>
          		</form>
          	</li>
        </ul>
      </div>
    </nav>

    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
            <a class="btn-floating btn-large teal accent-4">
              <i class="large mdi-image-timer-auto"></i>
            </a>
            <ul>
              @if (Auth::guest())
                <li><a href="{{ url('auth/login') }}" class="btn-floating red"><i class="large mdi-action-input"></i></a></li>
              @else
                <li><a href="{{ url('auth/logout') }}" class="btn-floating cyan"><i class="large mdi-action-lock-open"></i></a></li>
                <li><a class="btn-floating red"><i class="large mdi-action-home"></i></a></li>
              @endif
            </ul>
        </div>
</div>