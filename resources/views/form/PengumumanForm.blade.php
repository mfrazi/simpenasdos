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
<div class="row container">
    <h5 class="center light-blue-text"><u>Buat Pengumuman</u></h5>
    <form class="col s12" method="POST" action="{{ route('pengumuman.store') }}"  enctype="multipart/form-data" files="true">
        {{ csrf_field() }}
        <div class="row">
            <div class="input-field col s12 m10 l8">
                <input name="title" id="title" type="text" class="validate">
                <label for="title">Judul</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field">
                <textarea cols="10" name="content"></textarea>
            </div>
        </div>
        <div class="file-field input-field">
            <div class="btn light-blue">
                <span>Sisipan</span>
                <input name="file[]" type="file" multiple="">
            </div>
                <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>

        <br />
        <a href="{{ route('pengumuman.index') }}"}} class="btn waves-effect red accent-2 left">
            Kembali
        </a>
        <button class="btn waves-effect waves-light light-blue right" type="submit">
            Buat
        </button>
    </form>
</div>
<br />
<br />
@endsection
