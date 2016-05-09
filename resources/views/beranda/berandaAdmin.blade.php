@extends('base.base')

@section('title', 'Beranda')

@section('navbar')
    @include('base.navbarAdmin')
@endsection

@section('content')
    <div class="row center" style="margin-top: 18%;">
        <div class="col s10 push-s1 m6 push-m3 l6 push-l3">
            <a class="white-text" href="{{ route('download.manual', ['name' => 'admin']) }}">
                <div class="card-panel orange darken-2">
                    <span class="white-text">

                            Unduh User Manual Untuk Administrator

                    </span>
                </div>
            </a>
        </div>
    </div>
@endsection

@section('moreScripts')
    <script>
        $(document).ready(function () {
            $(".button-collapse").sideNav();
        });
    </script>
@endsection