<!--<div class="navbar-title">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h4><a href="#!" class="brand-logo" style="color:white;">Lis Fmat Wiki</a></h4>
			</div>
			<div class="col-md-8 pull-right">
				<div class="buttons-login pull-right">
					@if (Auth::guest())
						<a class="waves-effect waves-teal btn-flat btn-large">Iniciar Sesion</a>
						<a class="waves-effect waves-light btn deep-orange accent-1 btn-large"><i class="mdi-action-account-circle left "></i>Registrate</a>
					@else

					@endif
				</div>
			</div>
		</div>
	</div>
</div> -->

<div class="navbar-fixed">
    <nav class="white">
      <div class="nav-wrapper">
        <a href="#" class="brand-logo teal-text text-accent-4">Logo</a>
		    <a href="#" data-activates="mobile-demo" class="button-collapse teal-text text-lighten-1"><i class="mdi-navigation-menu"></i></a>

        <ul class="right hide-on-med-and-down">
          <li><a href="#" class="teal-text text-lighten-1">Materias</a></li>
         	<li><a href="#" class="teal-text text-lighten-1">Maestros</a></li>
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
          	<li><a href="components.html" class="teal-text text-accent-4" >Maestros</a></li>
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