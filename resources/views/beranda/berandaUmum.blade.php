@extends('base.base')

@section('title', 'Asisten Dosen')

@section('navbar')
    @include('base.navbarUmum')
@endsection

@section('content')
<br />
<br />
<div class="row container">
    @if($pengumuman == 1)
        <div class="row center">
            <div class="col s10 push-s1 m6 push-m3 l6 push-l3">
                <div class="card-panel orange darken-2">
                    <span class="white-text">
                        <a class="white-text" href="{{ route('download.daftar.asisten') }}">
                            Pengumuman Daftar Asisten
                        </a>
                    </span>
                </div>
            </div>
        </div>
    @endif
    <div>
</div>
@endsection

@section('moreScripts')
    <script>
        $(document).ready(function () {
            $(".button-collapse").sideNav();
        });
    </script>
@endsection