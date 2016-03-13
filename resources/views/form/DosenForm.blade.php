<!-- id
nama
NIP
username
password
fk role -->
@extends('base.base')

@section('title', 'Tambah Dosen')

@section('navbar')
    @include('base.navbarAdmin')
@endsection

@section('content')
<br />
<br />
<div class="row container">
    <form class="col s10 push-s1 m6 push-m3 l6 push-l3" method="POST" action="{{ route('storedosen') }}">
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
                <input name="username" id="username" type="text" required="" aria-required="true">
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
        <a href="{{ route('dosen') }}"}} class="btn waves-effect red accent-2 left">
            Batal
        </a>
        <button id="submitButton" class="btn waves-effect light-blue right" type="submit">
            Tambah
        </button>
    </form>
</div>
@endsection

@section('moreScripts')
<script>
$("#nip").keyup(function(){
    $("#username").val(this.value);
});

function checkPasswordMatch() {
    var password = $("#password").val();
    var confirmPassword = $("#repassword").val();

    if (password != confirmPassword){
        $("#checkpassword").html('<div class="red-text text-accent-1">Password tidak sama</div>');
        $("#submitButton").attr('disabled', true);
    }
    else {
        $("#checkpassword").html('');
        $("#submitButton").attr('disabled', false);
    }
}

$(document).ready(function () {
   $("#repassword").keyup(checkPasswordMatch);
   $("#password").keyup(checkPasswordMatch);
});
</script>
@endsection
