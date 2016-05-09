@extends('base.base')

@section('title', 'Beranda')

@section('navbar')
    @include('base.navbarDosen')
@endsection

@section('content')
    @if ($role == 'dosen')
        role == {{ $role }}
        <div class="row center" style="margin-top: 18%;">
            <div class="col s10 push-s1 m6 push-m3 l6 push-l3">
                <a class="white-text" href="{{ route('download.manual', ['name' => 'dosen']) }}">
                    <div class="card-panel orange darken-2">
                    <span class="white-text">
                            Unduh User Manual Untuk Dosen
                    </span>
                    </div>
                </a>
            </div>
        </div>
    @else
        <div class="row center" style="margin-top: 18%;">
            <div class="col s10 push-s1 m6 push-m3 l6 push-l3">
                <a class="white-text" href="{{ route('download.manual', ['name' => 'kaprodi']) }}">
                    <div class="card-panel orange darken-2">
                    <span class="white-text">
                            Unduh User Manual Untuk Kaprodi
                    </span>
                    </div>
                </a>
            </div>
        </div>
    @endif

@endsection

@section('moreScripts')
    <script>
        $(document).ready(function () {
            $(".button-collapse").sideNav();
        });
    </script>
@endsection