<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper blue-grey darken-4">
            <a href="#" class="brand-logo" style="padding:10">
                <img class="navbar-logo" src="img/logotc_navbar.PNG">
            </a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="{{ route('dosen.index') }}">Dosen</a></li>
                <li><a href="{{ route('kelas.index') }}">Kelas</a></li>
                <li><a href="{{ route('pengumuman.index') }}">Pengumuman</a></li>
                <li><a href="{{ route('sertifikat.showOrder') }}">Sertifikat</a></li>
                <li><a href="{{ route('asisten.show') }}">Asdos</a></li>
                <li><a href="{{ route('pengaturan') }}">Pengaturan</a></li>
                <li><a href="{{ route('selfedit') }}"><i class="material-icons right white-text">perm_identity</i>{{ $name }}</a></li>
                <li class="red"><a href="{{ route('logout') }}"><i class="material-icons white-text">power_settings_new</i></a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="{{ route('dosen.index') }}">Dosen</a></li>
                <li><a href="{{ route('kelas.index') }}">Kelas</a></li>
                <li><a href="{{ route('pengumuman.index') }}">Pengumuman</a></li>
                <li><a href="{{ route('sertifikat.showOrder') }}">Sertifikat</a></li>
                <li><a href="{{ route('asisten.show') }}">Asdos</a></li>
                <li><a href="{{ route('pengaturan') }}">Pengaturan</a></li>
                <li><a href="{{ route('selfedit') }}"><i class="material-icons right">perm_identity</i>{{ $name }}</a></li>
                <li><a href="{{ route('logout') }}"><i class="material-icons right">power_settings_new</i>Logout</a></li>
            </ul>    
        </div>
    </nav>
</div>