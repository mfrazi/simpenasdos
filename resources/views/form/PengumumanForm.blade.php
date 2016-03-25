@extends('base.base')

@section('title', 'Buat Pengumuman')

@section('moreStyles')
    <script src="{{ URL::asset('tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector:'textarea',
            height : "300"
        });
    </script>
@endsection

@section('navbar')
    @include('base.navbarAdmin')
@endsection

@section('content')
<br />
<br />
<div class="row container">
    <form class="col s12" method="POST" action="{{ route('pengumuman.store') }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="input-field col s12 m10 l8">
                <input name="judul" id="judul" type="text" class="validate">
                <label for="judul">Judul</label>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m10 l8 section scrollspy">
                <label for="tanggal">Tanggal</label>
            </div>
            <div class="input-field col s12 m10 l8 section scrollspy">
                <input name="tanggal" id="tangal" type="date" class="datepicker">
            </div>
        </div>
        <div class="row">
            <div class="input-field">
                <textarea cols="10" name="isi">Isi di sini</textarea>
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
</div>
<br />
<br />
@endsection

@section('moreScripts')
<script>
    $('.datepicker').pickadate({
        selectMonths: true,
        selectYears: 5 // Creates a dropdown of 15 years to control year
    });
</script>
@endsection
