<div class="navbar-fixed">
	<nav>
	    <div class="nav-wrapper blue-grey darken-4">
	        <a href="#" class="brand-logo" style="padding:10">
                <img class="navbar-logo" src="{{ URL::asset('img/logotc.PNG') }}">
            </a>
	        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
	        <ul id="nav-mobile" class="right hide-on-med-and-down">
	            <li><a href="{{ route('daftar.create') }}">Daftar</a></li>
	            <li><a href="{{ route('sertifikat.index')  }}">Sertifikat</a></li>
	        </ul>
	        <ul class="side-nav" id="mobile-demo">
	        	<li><a href="{{ route('daftar.create') }}">Daftar</a></li>
	            <li><a href="{{ route('sertifikat.index')  }}">Sertifikat</a></li>
	        </ul>
	    </div>
	</nav>
</div>