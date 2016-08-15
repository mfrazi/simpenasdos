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
                <div class="card-panel orange darken-2">
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
    <form class="col s12 m8 push-m2 l6 push-l3 white z-depth-2" style="padding:0" method="POST" action="{{ route('dosen.store') }}">
        {{ csrf_field() }}
        <div class="section center white-text blue-grey darken-4">
            <h5>
                Tambah Dosen
            </h5>
        </div>
        <div class="divider"></div>
        <div class="section"></div>
        <div class="row">
            <div class="input-field col s1"></div>
            <div class="input-field col s10">
                <input name="name" id="name" type="text" required="" aria-required="true">
                <label for="name">Nama</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s1"></div>
            <div class="input-field col s10">
                <input name="NIP" id="nip" type="text" required="" aria-required="true">
                <label for="nip">NIP</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s1"></div>
            <div class="input-field col s10">
                <input placeholder="Default sama dengan NIP" name="username" id="username" type="text" required="" aria-required="true">
                <label for="username">Username</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s1"></div>
            <div class="input-field col s10">
                <input name="password" id="password" type="password" required="" aria-required="true">
                <label for="password">Password</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s1"></div>
            <div class="input-field col s10">
                <input name="repassword" id="repassword" type="password" required="" aria-required="true">
                <label for="repassword">Konfirmasi Password</label>
                <div id="checkpassword"></div>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s10 m5 push-s1 push-m1 hide-on-small-only">
                <a href="{{ route('dosen.index') }}" class="btn waves-effect orange darken-2 accent-2 left">
                    Kembali
                </a>
            </div>
            <div class="input-field col s10 m5 push-s1 push-m1">
                <button class="submitButton btn waves-effect light-green darken-2 hide-on-med-and-up" type="submit">
                    Tambah
                </button>
                <button class="submitButton btn waves-effect light-green darken-2 right hide-on-small-only" type="submit">
                    Tambah
                </button>
            </div>
            <div class="input-field col s10 m5 push-s1 push-m1 hide-on-med-and-up">
                <a href="{{ route('dosen.index') }}" class="btn waves-effect orange darken-2 accent-2 left">
                    Kembali
                </a>
            </div>
        </div>
        <div class="section"></div>
    </form>
</div>
@endsection

@section('moreScripts')
<script src="{{ URL::asset('js/dosencreate.js') }}">
    $(document).ready(function() {    
        $(".button-collapse").sideNav();
    });
</script>
@endsection
