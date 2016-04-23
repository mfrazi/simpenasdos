<div class="navbar-fixed">
	<nav>
	    <div class="nav-wrapper blue-grey darken-4">
	        <a href="#" class="brand-logo" style="padding:10">
                <img class="navbar-logo" src="{{ URL::asset('img/logotc_navbar.PNG') }}">
            </a>
	        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
	        <ul id="nav-mobile" class="right hide-on-med-and-down">
				@if($navbar == 1)
	            	<li class="grey darken-4"><a href="{{ route('pilihasdos.index') }}">Penerimaan Asdos</a></li>
				@else
					<li><a href="{{ route('pilihasdos.index') }}">Penerimaan Asdos</a></li>
				@endif

				@if($navbar == 7)
	            <li class="grey darken-4"><a href="{{ route('selfedit') }}"><i class="material-icons right white-text">perm_identity</i>{{ $name }}</a></li>
				@else
					<li><a href="{{ route('selfedit') }}"><i class="material-icons right white-text">perm_identity</i>{{ $name }}</a></li>
				@endif
	            <li class="red"><a href="{{ route('logout') }}"><i class="material-icons white-text">power_settings_new</i></a></li>
	        </ul>
	        <ul class="side-nav" id="mobile-demo">
	        	<li><a href="{{ route('pilihasdos.index') }}">Penerimaan Asdos</a></li>
	            <li><a href="{{ route('selfedit') }}"><i class="material-icons right white-text">perm_identity</i>{{ $name }}</a></li>
	            <li><a href="{{ route('logout') }}"><i class="material-icons white-text">power_settings_new</i></a></li>
	        </ul>
	    </div>
	</nav>
</div>