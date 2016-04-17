@extends('base.base')

@section('title', 'Edit Dosen')

@section('navbar')
    @if($ok == 2)
        @include('base.navbarAdmin')
    @else
        @include('base.navbarDosen')
    @endif
@endsection

@section('content')
<br />
<br />
<div>
    <div class="row container ">
        @if(Session::has('success') || Session::has('fail'))
            <div class="row center">
                <div class="col s10 push-s1 m6 push-m3 l6 push-l3">
                    @if(Session::has('success'))
                    <div class="card-panel orange darken-2">
                        <span class="white-text">{{ Session::get('success') }}</span>
                    </div>
                    @endif
                    @if(Session::has('password'))
                    <div class="card-panel orange darken-2">
                        <span class="white-text">{{ Session::get('password') }}</span>
                    </div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="card-panel red accent-2">
                        <span class="white-text">{{ Session::get('fail') }}</span>
                    </div>
                    @endif
                </div>
            </div>
        @endif

        <form class="col s10 push-s1 m8 push-m2 l6 push-l3 z-depth-2 white" style="padding:0;" method="POST" action="{{ route('dosen.update', ['dosen' => $user->id]) }}">
            {{ csrf_field() }}
            <div class="section center white-text blue-grey darken-4">
                <h5>
                    Ubah Akun
                </h5>
            </div>
            <div class="divider"></div>
            <div class="section"></div>
            <div class="row">\
                <div class="input-field col s10 push-s1">
                    <input value="{{ $user->name }}" name="name" id="name" type="text" class="validate">
                    <label for="name">Nama</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s1"></div>
                <div class="input-field col s10">
                    <input value="{{ $user->NIP }}" name="NIP" id="nip" type="text" class="validate">
                    <label for="nip">NIP</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s1"></div>
                <div class="input-field col s10">
                    <input value="{{ $user->username }}" name="username" id="username" type="text" class="validate">
                    <label for="username">Username</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s1"></div>
                <div class="input-field col s10">
                    <input name="password" id="password" type="password" class="validate">
                    <label for="password">Password Baru</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s1"></div>
                <div class="input-field col s10">
                    <input name="repassword" id="repassword" type="password" class="validate">
                    <label for="repassword">Konfirmasi Password Baru</label>
                    <div id="checkpassword"></div>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s10 push-s1">
                    <a href="{{ route('dosen.index') }}" class="btn waves-effect orange darken-1 left">
                        Kembali
                    </a>
                    <button id="submitButton" class="btn waves-effect light-green darken-2 right" type="submit">
                        Ubah
                    </button>
                </div>
            </div>
            <div class="section"></div>
        </form>
    </div>
</div>
@endsection

@section('moreScripts')
    <script src="{{ URL::asset('js/dosenedit.js') }}"></script>
@endsection

