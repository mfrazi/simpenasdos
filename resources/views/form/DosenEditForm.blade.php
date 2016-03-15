@extends('base.base')

@section('title', 'Edit Dosen')

@section('navbar')
    @include('base.navbarAdmin')
@endsection

@section('content')
<br />
<br />
<div class="row container">
    @if(Session::has('success') || Session::has('fail'))
        <div class="row center">
            <div class="col s10 push-s1 m6 push-m3 l6 push-l3">
                @if(Session::has('success'))
                <div class="card-panel light-blue">
                    <span class="white-text">{{ Session::get('success') }}</span>
                </div>
                @endif
                @if(Session::has('password'))
                <div class="card-panel light-blue">
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

    <form class="col s10 push-s1 m8 push-m2 l6 push-l3" method="POST" action="{{ route('dosen.update', ['dosen' => $user->id]) }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="input-field col s12">
                <input value="{{ $user->nama }}" name="nama" id="nama" type="text" class="validate">
                <label for="nama">Nama</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input value="{{ $user->NIP }}" name="NIP" id="nip" type="text" class="validate">
                <label for="nip">NIP</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input value="{{ $user->username }}" name="username" id="username" type="text" class="validate">
                <label for="username">Username</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input name="password" id="password" type="password" class="validate">
                <label for="password">Password Baru</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input name="repassword" id="repassword" type="password" class="validate">
                <label for="repassword">Konfirmasi Password Baru</label>
                <div id="checkpassword"></div>
            </div>
        </div>
        <a href="{{ route('dosen.index') }}" class="btn waves-effect red accent-2 left">
            Kembali
        </a>
        <button id="submitButton" class="btn waves-effect light-blue right" type="submit">
            Ubah
        </button>
    </form>
</div>
@endsection

@section('moreScripts')
<script src="{{ URL::asset('js/dosenedit.js') }}"></script>
@endsection
