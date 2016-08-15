@extends('base.base')

@section('title', 'Tambah Kelas')

@section('navbar')
    @include('base.navbarAdmin')
@endsection

@section('content')
<br />
<br />
<div class="row container ">
    @if(Session::has('success') || Session::has('fail'))
        <div class="row center">
            <div class="col s10 push-s1 m6 push-m3 l6 push-l3">
                @if(Session::has('success'))
                <div class="card-panel orange darken-2">
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

    <div class="row">
        <div class="col s12">
            <form method="POST" action="{{ route('kelas.store') }}" class="white z-depth" style="padding:0">
                {{ csrf_field() }}
                <div class="section center white-text blue-grey darken-4">
                    <h5>
                        Tambah Kelas
                    </h5>
                </div>
                <div class="divider"></div>
                <div class="section"></div>
                <div class="row">
                    <div class="input-field col s10 l7 push-s1 push-l1">
                        <select id="kelas" name="kelas">
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                        <label>
                            Pilih Matakuliah
                        </label>
                    </div>
                    <div class="input-field col s10 l3 push-s1 push-l1">
                        <input name="jumlah" id="jumlah" type="number" min="1" value="1" required="" aria-required="true">
                        <label for="nip">Jumlah Kelas</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s10 m5 push-s1 push-m1 hide-on-small-only">
                        <a href="{{ route('kelas.index') }}" class="btn waves-effect orange darken-2 accent-2 left">
                            Kembali
                        </a>
                    </div>
                    <div class="input-field col s10 m5 push-s1 push-m1">
                        <button id="submitButton" class="btn waves-effect light-green darken-2 hide-on-med-and-up" type="submit">
                            Tambah Kelas
                        </button>
                        <button id="submitButton" class="btn waves-effect light-green darken-2 right hide-on-small-only" type="submit">
                            Tambah Kelas
                        </button>
                    </div>
                    <div class="input-field col s10 m5 push-s1 push-m1 hide-on-med-and-up">
                        <a href="{{ route('kelas.index') }}" class="btn waves-effect orange darken-2 accent-2 left">
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="section"></div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('moreScripts')
<script>
    $(document).ready(function(){
        $('select').material_select();
        $(".button-collapse").sideNav();
    });
</script>
@endsection
