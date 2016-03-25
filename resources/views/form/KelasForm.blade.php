@extends('base.base')

@section('title', 'Tambah Kelas')

@section('navbar')
    @include('base.navbarAdmin')
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

    <form method="POST" action="{{ route('kelas.store') }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="input-field col s12 m8 l8">
                <select id="kelas" name="kelas">
                    @foreach($courses as $course)
                    <option value="{{ $matkul->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
                <label>
                    Pilih Matakuliah
                </label>
            </div>
            <div class="input-field col s6 m4 l4">
                <input name="jumlah" id="jumlah" type="number" min="1" value="1" required="" aria-required="true">
                <label for="nip">Jumlah</label>
            </div>
        </div>

        <a href="{{ route('kelas.index') }}"}} class="btn waves-effect red accent-2 left">
            Kembali
        </a>
        <button id="submitButton" class="btn waves-effect light-blue right" type="submit">
            Tambah Kelas
        </button>
    </form>
</div>
@endsection

@section('moreScripts')
<script>
    $(document).ready(function(){
        $('select').material_select();
    });
</script>
@endsection
