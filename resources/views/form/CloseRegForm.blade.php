@extends('base.base')

@section('title', 'Tambah Asisten')

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

        <form class="col s10 push-s1 m8 push-m2 l8 push-l2 white z-depth-2" method="POST" action="{{ route('asisten.addAssistant') }}" enctype="multipart/form-data" style="padding:0">
            {{ csrf_field() }}
            <div class="section center white-text blue-grey darken-4">
                <h5>
                    Tambah Asisten Dosen
                </h5>
            </div>
            <div class="section"></div>
            <div class="row">
                <div class="input-field col s10 push-s1">
                    <input name="name" id="name" type="text" class="validate" required="" aria-required="true">
                    <label for="name">Nama</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s10 push-s1">
                    <input name="NRP" id="nrp" type="text" class="validate" required="" aria-required="true">
                    <label for="nrp">NRP</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s10 push-s1">
                    <select name="kelas">
                        <option value="" disabled selected>Pilih Kelas</option>
                        @foreach($classrooms as $classroom)
                            <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                        @endforeach
                    </select>
                    <label>Kelas</label>
                </div>
            </div>
            <div class="row">
                <div class="col s10 push-s1">
                    <button class="btn waves-effect waves-light center light-green darken-2 right" type="submit">
                        Tambah Asisten
                    </button>
                </div>
            </div>
            <div class="section"></div>
        </form>
    </div>
@endsection

@section('moreScripts')
    <script>
        $(document).ready(function() {
            $('select').material_select();
            $(".button-collapse").sideNav();
        });
    </script>
@endsection
