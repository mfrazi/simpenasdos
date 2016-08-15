
@extends('base.base')

@section('title', 'Kelas')

@section('navbar')
    @include('base.navbarAdmin')
@endsection

@section('content')
<br />
<br />

@if(Session::has('success'))
    <div class="row center">
        <div class="col s10 push-s1 m6 push-m3 l6 push-l3">
            @if(Session::has('success'))
            <div class="card-panel red accent-2">
                <span class="white-text">{{ Session::get('success') }}</span>
            </div>
            @endif
        </div>
    </div>
@endif

<div class="container">
    <div class="row">
        <div class="input-field col s12">
            <div class="col col s12 m8 push-m2 white z-depth-2" style="padding:0">
                <div class="section center white-text blue-grey darken-4">
                    <h5>
                        Kelas
                    </h5>
                </div>
                <div class="row">
                    <div class="section"></div>
                    <div class="input-field col s10 push-s1">
                        <div class ="row">
                            <div class="col s12 m l5">
                                <a class="waves-effect waves-light light-green darken-2 btn" href="{{ route('kelas.create') }}">
                                    <i class="hide-on-med-and-down material-icons left">queue</i>
                                    Tambah Kelas
                                </a>
                            </div>
                        </div>

                        @foreach($classrooms as $k)
                        <a href="{{ route('kelas.show', ['kelas' => $k->course_id]) }}">
                            <div class="card-panel orange darken-2 z-depth-1">
                                <span class="white-text">
                                    {{ $k->course->name }}
                                </span>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
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