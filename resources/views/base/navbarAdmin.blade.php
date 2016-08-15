<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper blue-grey darken-4">
            <a href="{{ route('berandaadmin') }}" class="brand-logo" style="padding:10px;">
                <img class="navbar-logo" src="{{ URL::asset('img/logotc_navbar.PNG') }}">
            </a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                @if($navbar == 1)
                    <li class="grey darken-4"><a href="{{ route('dosen.index') }}">Dosen</a></li>
                @else
                    <li><a href="{{ route('dosen.index') }}">Dosen</a></li>
                @endif

                @if($navbar == 2)
                    <li class="grey darken-4"><a href="{{ route('kelas.index') }}">Kelas</a></li>
                @else
                    <li><a href="{{ route('kelas.index') }}">Kelas</a></li>
                @endif

                @if($navbar == 3)
                    <li class="grey darken-4"><a href="{{ route('pengumuman.index') }}">Pengumuman</a></li>
                @else
                    <li><a href="{{ route('pengumuman.index') }}">Pengumuman</a></li>
                @endif

                @if($navbar == 4)
                    <li class="grey darken-4"><a href="{{ route('sertifikat.showOrder') }}">Sertifikat</a></li>
                @else
                    <li><a href="{{ route('sertifikat.showOrder') }}">Sertifikat</a></li>
                @endif

                @if($navbar == 5)
                    <li class="grey darken-4"><a href="{{ route('asisten.show') }}">Asdos</a></li>
                @else
                    <li><a href="{{ route('asisten.show') }}">Asdos</a></li>
                @endif

                @if($navbar == 6)
                    <li class="grey darken-4"><a href="{{ route('pengaturan') }}">Pengaturan</a></li>
                @else
                    <li><a href="{{ route('pengaturan') }}">Pengaturan</a></li>
                @endif

                @if($navbar == 7)
                <li class="grey darken-4"><a href="{{ route('selfedit') }}"><i class="material-icons right white-text">perm_identity</i>{{ $name }}</a></li>
                @else
                    <li><a href="{{ route('selfedit') }}"><i class="material-icons right white-text">perm_identity</i>{{ $name }}</a></li>
                @endif

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