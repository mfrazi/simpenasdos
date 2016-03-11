<!-- id
nama
NIP
username
password
fk role -->
@extends('base.base')

@section('title', 'Tambah Dosen')

@section('content')
<form class="col s12" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <div class="row">
        <div class="input-field col s12">
            <input name="nama" id="nama" type="text" class="validate">
            <label for="nama">Nama</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input name="nip" id="nip" type="text" class="validate">
            <label for="nip">NIP</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input name="username" id="username" type="text" class="validate">
            <label for="username">Username</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input name="password" id="password" type="password" class="validate">
            <label for="password">Password</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input name="repassword" id="repassword" type="password" class="validate">
            <label for="repassword">Konfirmasi Password</label>
        </div>
    </div>
    <button class="btn waves-effect waves-light" type="submit" name="action">
        Login
    </button>
</form>
@endsection
