@extends('base.base')

@section('title', 'Tambah Dosen')

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
                @if(Session::has('fail'))
                <div class="card-panel red accent-2">
                    <span class="white-text">{{ Session::get('fail') }}</span>
                </div>
                @endif
            </div>
        </div>
    @endif

    <form class="col s10 push-s1 m8 push-m2 l6 push-l3" method="POST" action="{{ route('dosen.store') }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="input-field col s12">
                <input name="nama" id="nama" type="text" required="" aria-required="true">
                <label for="nama">Nama</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input name="NIP" id="nip" type="text" required="" aria-required="true">
                <label for="nip">NIP</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input placeholder="Default sama dengan NIP" name="username" id="username" type="text" required="" aria-required="true">
                <label for="username">Username</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input name="password" id="password" type="password" required="" aria-required="true">
                <label for="password">Password</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input name="repassword" id="repassword" type="password" required="" aria-required="true">
                <label for="repassword">Konfirmasi Password</label>
                <div id="checkpassword"></div>
            </div>
        </div>
        <a href="{{ route('dosen.index') }}"}} class="btn waves-effect red accent-2 left">
            Kembali
        </a>
        <button id="submitButton" class="btn waves-effect light-blue right" type="submit">
            Tambah
        </button>
    </form>
</div>
@endsection

@section('moreScripts')
<script src="{{ URL::asset('js/dosencreate.js') }}"></script>
@endsection
