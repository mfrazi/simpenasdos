@extends('base.base')

@section('title', 'Daftar Asisten')

@section('navbar')
    @include('base.navbarUmum')
@endsection

@section('moreStyles')
    <script src="{{ URL::asset('sweetalert/sweetalert.min.js') }}"></script>
    <link href="{{ URL::asset('sweetalert/sweetalert.css') }}" rel="stylesheet" />
@endsection

@section('content')
<br />
<br />
<div class="row container">
    @if($pendaftaran == 1)
    @if(Session::has('success') || Session::has('fail'))
        <div class="row center">
            <div class="col s10 push-s1 m6 push-m3 l10 push-l1">
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
    
    <form class="col s10 push-s1 m8 push-m2 l8 push-l2 white z-depth-2" style="padding:0" method="POST" action="{{ route('daftar.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="section center white-text blue-grey darken-4">
            <h5>
                Pendaftaran Asisten Dosen
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
                <input name="phone_number" id="phone_number" type="text" class="validate" required="" aria-required="true">
                <label for="phone_number">Nomor HP</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s10 push-s1">
                <input name="ipk" id="ipk" type="number" step="0.01" min="0" max="4" class="validate" required="" aria-required="true"/>
                <label for="ipk">IPK</label>
            </div>
        </div>

        <div class="row">
             <div class="col s10 push-s1">
                <input name="pengalaman" type="checkbox" class="filled-in" id="pengalaman" />
                <label for="pengalaman">Memiliki pengalaman menjadi asisten sebelumnya</label>
             </div>
        </div>

        <div class="row">
            <div class="input-field col s12 m3 l7 push-l1">
                <select name="kelas1">
                    <option value="" disabled selected>Pilih Kelas</option>
                    @foreach($classrooms as $classroom)
                        <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-field col s12 m3 l3 push-l1">
                <select name="nilai_kelas1">
                    <option value="" disabled selected>Nilai Kelas</option>
                    <option value="A">A</option>
                    <option value="AB">AB</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12 m3 l7 push-l1">
                <select name="kelas2">
                    <option value="" disabled selected>Pilih Kelas</option>
                    @foreach($classrooms as $classroom)
                        <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-field col s12 m3 l3 push-l1">
                <select name="nilai_kelas2">
                    <option value="" disabled selected>Nilai Kelas</option>
                    <option value="A">A</option>
                    <option value="AB">AB</option>
                </select>
            </div>
        </div>

        <div class="file-field col s10 push-s1">
            <div class="btn light-green darken-2">
                <span>Transkrip</span>
                <input name="transkrip" type="file">
            </div>
                <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <div class="row"></div>
        <div class="row">
            <div class="col l11">
                <button id="submit_button" class="btn waves-effect waves-light center right light-green darken-2" type="submit">
                    Daftar
                </button>
            </div>
        </div>
        <div class="section"></div>
    </form>
    @else
        <div class="row center">
            <div class="col s10 push-s1 m6 push-m3 l10 push-l1">
                <div class="card-panel orange darken-2">
                    <span class="white-text">Pendaftaran Belum Dibuka</span>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection

@section('moreScripts')
    <script>
        $('#submit_button').on('click',function(e){
            e.preventDefault();
            var form = $(this).parents('form');
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function(isConfirm){
                if (isConfirm) form.submit();
            });
        })
    </script>
    <script>
        $(document).ready(function() {
            $('select').material_select();
            $(".button-collapse").sideNav();
        });
    </script>
@endsection
