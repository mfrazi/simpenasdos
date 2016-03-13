<!-- id
nama
NIP
username
password
fk role -->
@extends('base.base')

@section('title', 'Edit Dosen')

@section('navbar')
    @include('base.navbarAdmin')
@endsection

@section('content')
<form class="col s12" method="POST" action="{{ route('storedosen') }}">
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
            <label for="password">Password Lama</label>
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
        </div>
    </div>
    <button class="btn waves-effect waves-light" type="submit" name="action">
        Ubah Dosen
    </button>
</form>
@endsection
