<!-- id
judul
tanggal
isi
path file att -->

@extends('base.base')

@section('title', 'Buat Pengumuman')

@section('moreStyles')
    <script src="{{ URL::asset('tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({ selector:'textarea' });
    </script>
@endsection

@section('content')
<form class="col s12" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <div class="row">
        <div class="input-field col s12">
            <input name="judul" id="judul" type="text" class="validate">
            <label for="judul">Judul</label>
        </div>
    </div>
    <div class="row">
        <div class="col s12 section scrollspy">
            <label for="tanggal">Tanggal</label>
        </div>
        <div class="input-field col s12 section scrollspy">
            <input name="tanggal" id="tangal" type="date" class="datepicker">
        </div>
    </div>
    <div class="row">
        <div class="input-field col s7">
            <textarea name="isi">Isi di sini</textarea>
        </div>
    </div>
    <div class="file-field input-field">
        <div class="btn">
            <span>Sisipan</span>
            <input name="file" type="file">
        </div>
            <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
        </div>
    </div>

    <button class="btn waves-effect waves-light" type="submit" name="action">
        Buat Pengumuman
    </button>
</form>
@endsection

@section('moreScripts')
<script>
    $('.datepicker').pickadate({
        selectMonths: true,
        selectYears: 5 // Creates a dropdown of 15 years to control year
    });
</script>
@endsection
