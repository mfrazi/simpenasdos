@extends('base.base')

@section('title', 'Daftar Asisten')

@section('navbar')
    @include('base.navbarUmum')
@endsection

@section('content')
<br />
<br />
<div class="row container">
<form class="col s10 push-s1 m8 push-m2 l8 push-l2" method="POST" action="{{ route('daftar.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="input-field col s12">
            <input name="name" id="name" type="text" class="validate" required="" aria-required="true">
            <label for="name">Nama</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input name="NRP" id="nrp" type="text" class="validate" required="" aria-required="true">
            <label for="nrp">NRP</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input name="ipk" id="ipk" type="number" step="0.01" min="0" max="4" class="validate" required="" aria-required="true">
            <label for="ipk">IPK</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12 m3 l9">
            <select name="kelas">
                <option value="" disabled selected>Pilih Kelas</option>
                @foreach($classrooms as $classroom)
                    <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="input-field col s12 m3 l3">
            <input name="nilai" id="nilai" type="text"class="validate" required="" aria-required="true">
            <label>Nilai Kelas</label>
        </div>
    </div>

    <div class="file-field input-field">
        <div class="btn">
            <span>Transkrip</span>
            <input name="transkrip" type="file">
        </div>
            <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
        </div>
    </div>
    <button class="btn waves-effect waves-light center" type="submit">
        Daftar
    </button>
</form>
</div>
@endsection

@section('moreScripts')
<script>
$(document).ready(function() {$('select').material_select();});
</script>
@endsection
