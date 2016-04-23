@extends('base.base')

@section('title', 'Sertifikat - Daftar Pemesan')

@section('navbar')
    @include('base.navbarAdmin')
@endsection

@section('content')

    <br/>
    <br/>
    <div class="container">
        <div class="row">
            @if(Session::has('success') || Session::has('fail'))
                <div class="row">
                    <div class="col s10 push-s1 m6 push-m3 l6 push-l3">
                        @if(Session::has('success'))
                            <div class="row center">
                                <div class="card-panel orange darken-2">
                                    <span class="white-text">{{ Session::get('success') }}</span>
                                </div>
                            </div>
                        @endif
                        @if(Session::has('fail'))
                            <div class="row center">
                                <div class="card-panel red accent-2">
                                    <span class="white-text">{{ Session::get('fail') }}</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endif
            <div class="white z-depth-2">
                <div class="section center white-text blue-grey darken-4">
                    <h5>
                        Daftar Asisten Dosen
                    </h5>
                </div>
                <div class="row">
                    <div class="section"></div>
                    <div class="col l10 push-l1">
                        <div class ="row">
                            <div class="col s4 m4 l4">
                                <a class="waves-effect waves-light light-green darken-2 btn" href="{{ route('asisten.showCloseRegForm') }}"><i class="material-icons left">queue</i>Tambah Asisten</a>
                            </div>
                            <div class="col s4 m4 l4">
                                <a class="waves-effect waves-light light-green darken-2 btn" href="{{ route('download.daftar.asisten') }}"><i class="material-icons left">system_update_alt</i>Download .xls</a>
                            </div>
                        </div>
                        
                        <table class="striped">
                            <thead class="orange darken-2 white-text">
                            <tr>
                                <th data-field="id">NRP</th>
                                <th data-field="name">Nama</th>
                                <th data-field="price">Mata Kuliah</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($assistants as $assistant)
                                <tr>
                                    <td>{{ $assistant->NRP }}</td>
                                    <td>{{ $assistant->name }}</td>
                                    <td>{{ $assistant->classroom->name }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="section"></div>
                    </div>
                </div>
            </div>
        </div>


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

