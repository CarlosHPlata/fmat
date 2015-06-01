<div class="navbar-fixed">
    <nav class="white">
      <div class="nav-wrapper">
        <a href="{{ url('/') }}" class="brand-logo teal-text text-accent-4">Logo</a>
		    <a href="#" data-activates="mobile-demo" class="button-collapse teal-text text-lighten-1"><i class="mdi-navigation-menu"></i></a>

        <ul class="right hide-on-med-and-down">
          <li><a href="{{ route('signature.index') }}" class="teal-text text-lighten-1">Materias</a></li>
         	<li><a href="{{ route('teacher.index') }}" class="teal-text text-lighten-1">Maestros</a></li>
          <li><a href="{{ route('bulletin.index') }}" class="teal-text text-lighten-1">Noticias</a></li>
          @if (!Auth::guest())
          @if (Auth::user()->isLevel('admin'))
              <li><a href="{{ route('user.index') }}" class="teal-text text-lighten-1">Usuarios</a></li>
          @endif
          @endif
          <li class="find">
            {!!Form::open(['method' => 'post', 'action' => 'SearchesController@search'])!!}
              <div class="input-field">
                <input id="search" type="search" class="" name="query" required>
                <label for="search"><i class="mdi-action-search teal-text text-lighten-1"></i></label>
                <i class="mdi-navigation-close"></i>
              </div>
            {!!Form::close()!!}
          </li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="{{ route('signature.index') }}" class="teal-text text-accent-4" >Materias</a></li>
          	<li><a href="{{ route('teacher.index') }}" class="teal-text text-accent-4" >Maestros</a></li>
            <li><a href="{{ route('bulletin.index') }}" class="teal-text text-accent-4" >Noticias</a></li>
            @if (!Auth::guest())
            @if (Auth::user()->isLevel('admin'))
              <li><a href="{{ route('user.index') }}" class="teal-text text-accent-4">Usuarios</a></li>
            @endif
            @endif
          	<li>
          		{!!Form::open(['method' => 'post', 'action' => 'SearchesController@search'])!!}
          		    <div class="input-field">
          		        <input id="search" type="search" name="query" required>
          		        <label for="search"><i class="mdi-action-search teal-text text-accent-4"></i></label>
          		        <i class="mdi-navigation-close"></i>
          		    </div>
          		{!!Form::close()!!}
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
                <li><a href="{{ route('profile') }}" class="btn-floating red"><i class="large mdi-action-home"></i></a></li>
              @endif
            </ul>
        </div>
</div>