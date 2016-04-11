@extends('base.base')

@section('title', 'Daftar Asisten')

@section('navbar')
    @include('base.navbarUmum')
@endsection

@section('content')
<br />
<br />
<div class="row container">
    @if(Session::has('success') || Session::has('fail'))
        <div class="row center">
            <div class="col s10 push-s1 m6 push-m3 l6 push-l3">
                @if(Session::has('success'))
                <div class="card-panel light-blue">
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
                <input name="phone_number" id="phone_number" type="text" class="validate" required="" aria-required="true">
                <label for="phone_number">Nomor HP</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                <input name="ipk" id="ipk" type="number" step="0.01" min="0" max="4" class="validate" required="" aria-required="true">
                <label for="ipk">IPK</label>
            </div>
        </div>

        <p>
            <input name="pengalaman" type="checkbox" class="filled-in" id="pengalaman" checked="checked" />
            <label for="pengalaman">Memiliki pengalaman menjadi asisten sebelumnya</label>
        </p>
        <div class="row">
            <div class="input-field col s12 m3 l9">
                <select name="kelas1">
                    <option value="" disabled selected>Pilih Kelas</option>
                    @foreach($classrooms as $classroom)
                        <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-field col s12 m3 l3">
                <input name="nilai_kelas1" id="nilai" type="text" class="validate" required="" aria-required="true">
                <label>Nilai Kelas Terakhir</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12 m3 l9">
                <select name="kelas2">
                    <option value="" disabled selected>Pilih Kelas</option>
                    @foreach($classrooms as $classroom)
                        <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-field col s12 m3 l3">
                <input name="nilai_kelas2" id="nilai" type="text">
                <label>Nilai Kelas Terakhir</label>
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
