<nav>
    <div class="nav-wrapper light-blue">
        <a href="#" class="brand-logo">Logo</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="{{ route('dosen.index') }}">Dosen</a></li>
            <li><a href="{{ route('kelas.index') }}">Kelas</a></li>
            <li><a href="{{ route('pengumuman.index') }}">Pengumuman</a></li>
            <li><a href="#">Pengaturan</a></li>
            <li><a href="{{ route('selfedit') }}"><i class="material-icons right white-text">perm_identity</i>{{ $name }}</a></li>
            <li><a href="{{ route('logout') }}"><i class="material-icons white-text">power_settings_new</i></a></li>
        </ul>
    </div>
</nav>
