<div class="navbar-title">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h4><a href="#!" class="brand-logo" style="color:white;">Lis Fmat Wiki</a></h4>
			</div>
			<div class="col-md-4 pull-right">
				<div class="buttons-login">
					@if (Auth::guest())
						<a class="waves-effect waves-teal btn-flat btn-large">Iniciar Sesion</a>
						<a class="waves-effect waves-light btn deep-orange accent-1 btn-large"><i class="mdi-action-account-circle left "></i>Registrate</a>
					@else

					@endif
				</div>
			</div>
		</div>
	</div>
</div>

<div>
    <nav>
      <div class="nav-wrapper">
		<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>

        <ul class="left hide-on-med-and-down">
          	<li><a href="sass.html">Materias</a></li>
         	<li><a href="components.html">Maestros</a></li>
        </ul>
        <ul class="right hide-on-med-and-down">
          	<li class="find">
          		<form>
          		    <div class="input-field">
          		        <input id="search" type="search" required>
          		        <label for="search"><i class="mdi-action-search"></i></label>
          		        <i class="mdi-navigation-close"></i>
          		    </div>
          		</form>
          	</li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="sass.html">Materias</a></li>
          	<li><a href="components.html">Maestros</a></li>
          	<li>
          		<form>
          		    <div class="input-field">
          		        <input id="search" type="search" required>
          		        <label for="search"><i class="mdi-action-search"></i></label>
          		        <i class="mdi-navigation-close"></i>
          		    </div>
          		</form>
          	</li>
        </ul>
      </div>
    </nav>
</div>