@extends('base.base')

@section('title', 'Sertifikat - Daftar Pemesan')

@section('navbar')
    @include('base.navbarAdmin')
@endsection

@section('content')

    <br/>
    <br/>
    <div class="container">
        <div class="row white">
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
            <div class="section center white-text blue-grey darken-4">
                <h5>
                    Pemesan Sertifikat
                </h5>
            </div>
            <div class="section"></div>
            <div class="col l10 push-l1">
                <table class="responsive-table highlight">
                    <thead class="orange darken-2">
                    <tr>
                        <th data-field="id">NRP</th>
                        <th data-field="name">Nama</th>
                        <th data-field="price">Nomor HP</th>
                        <th data-field="price">Mata Kuliah</th>
                        <th data-field="price">Cetak</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($orderers as $orderer)
                        <tr>
                            <td>{{ $orderer->NRP }}</td>
                            <td>{{ $orderer->name }}</td>
                            <td>{{ $orderer->phone_number }}</td>
                            <td>{{ $orderer->classroom->name }}</td>
                            <td>
                                @if($orderer->is_certificate_printed)
                                    Tercetak
                                @else
                                    <a class="waves-effect waves-light light-green darken-2 btn" href="{{ route('sertifikat.print', $orderer->id) }}">cetak</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <div class="section"></div> 
            </div>
        </div>
        
    </div>
@endsection

@section('moreScripts')
    <script>
        $(document).ready(function() {$('select').material_select();});
    </script>
@endsection

