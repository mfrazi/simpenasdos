<!-- id
Nama
NRP
IPK
fk kelas < tidak perlu di database, di table pilih kelas aja
nilai kelas
path file transkip
status (default belum diterima) -->
@extends('base.base')

@section('title', 'Daftar Asisten')

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
            <input name="nrp" id="nrp" type="text" class="validate">
            <label for="nrp">NRP</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input name="ipk" id="ipk" type="text" class="validate">
            <label for="ipk">IPK</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s6">
            <select name="kelas1">
                <option value="" disabled selected>Pilih Kelas</option>
                <option value="1">Kelas 1</option>
                <option value="2">Kelas 2</option>
                <option value="3">Kelas 3</option>
            </select>
        </div>
        <div class="input-field col s6">
            <input name="nilai2" id="nilai1" type="text" class="validate" />
            <label>Nilai Kelas</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6">
            <select name="kelas2">
                <option value="" disabled selected>Pilih Kelas</option>
                <option value="1">Kelas 1</option>
                <option value="2">Kelas 2</option>
                <option value="3">Kelas 3</option>
            </select>
        </div>
        <div class="input-field col s6">
            <input name="nilai2" id="nilai2" type="text" class="validate" />
            <label>Nilai Kelas</label>
        </div>
    </div>

    <div class="file-field input-field">
        <div class="btn">
            <span>Transkrip</span>
            <input name="file" type="file">
        </div>
            <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
        </div>
    </div>
    <button class="btn waves-effect waves-light" type="submit" name="action">
        Daftar
    </button>
</form>
@endsection

@section('moreScripts')
<script>
$(document).ready(function() {$('select').material_select();});
</script>
@endsection
