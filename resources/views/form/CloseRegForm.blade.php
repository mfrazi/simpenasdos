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

        <form class="col s10 push-s1 m8 push-m2 l8 push-l2" method="POST" action="{{ route('asisten.addAssistant') }}" enctype="multipart/form-data">
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
                <div class="input-field col s12 m3 l9">
                    <select name="kelas">
                        <option value="" disabled selected>Pilih Kelas</option>
                        @foreach($classrooms as $classroom)
                            <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button class="btn waves-effect waves-light center" type="submit">
                Tambah Asisten
            </button>
        </form>
    </div>
@endsection

@section('moreScripts')
    <script>
        $(document).ready(function() {$('select').material_select();});
    </script>
@endsection
