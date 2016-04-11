@extends('base.base')

@section('title', 'Sertifikat - Daftar Pemesan')

@section('navbar')
    @include('base.navbarAdmin')
@endsection

@section('content')

    <br/>
    <br/>
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

        <h3>Daftar Asisten Dosen</h3>

        <div class="row">
            <div class="col s4 m4 l4">
                <a class="waves-effect waves-light btn" href="{{ route('asisten.showCloseRegForm') }}"><i class="material-icons left">note_add</i>Tambah Asisten</a>
            </div>
            <div class="col s4 m4 l4">
                <a class="waves-effect waves-light btn"><i class="material-icons left">play_for_work</i>Download .xls</a>
            </div>
        </div>

        <table class="striped">
            <thead>
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


    </div>
@endsection

@section('moreScripts')
    <script>
        $(document).ready(function() {$('select').material_select();});
    </script>
@endsection

