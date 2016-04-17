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
<div class="row container white z-depth-2">
    <div class="section center white-text blue-grey darken-4">
        <h5>
            Buat Pengumuman
        </h5>
    </div>
    <form class="col s10 push-s1" method="POST" action="{{ route('pengumuman.store') }}"  enctype="multipart/form-data" files="true" style="padding:0">
        {{ csrf_field() }}
        <div class="row">
            <div class="section"></div>
            <div class="input-field col s12 m10 l12">
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
            <div class="btn light-green darken-2">
                <span>Sisipan</span>
                <input name="file[]" type="file" multiple="">
            </div>
                <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <a href="{{ route('pengumuman.index') }}"}} class="btn waves-effect orange darken-2 accent-2 left">
                    Kembali
                </a>
                <button class="btn waves-effect waves-light light-green darken-2 right" type="submit">
                    Buat
                </button>
            </div>
        </div>
        <br />
    </form>
</div>
<br />
<br />
@endsection
@section('moreScripts')
    <script>
        $(document).ready(function () {
            $(".button-collapse").sideNav();
        });
    </script>
@endsection