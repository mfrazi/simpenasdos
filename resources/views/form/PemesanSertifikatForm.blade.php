@extends('base.base')

@section('title', 'Sertifikat - Daftar Pemesan')

@section('navbar')
    @include('base.navbarAdmin')
@endsection

@section('content')
    <br/>
    <br/>
    <div class="container">
        <div class="row white z-depth-2">
            @if(Session::has('success') || Session::has('fail'))
                <div class="row center">
                    <div class="col s10 push-s1 m6 push-m3">
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
            <div class="col s12 l10 push-l1">
                <i>* Silakan tekan tombol</i>&nbsp&nbspBELUM TERCETAK <i>untuk menandai pesanan sertifikat sudah dicetak</i>
                <div class="section"></div>
                <table class="responsive-table bordered">
                    <thead class="orange darken-2 white-text">
                    <tr>
                        <th data-field="id">NRP</th>
                        <th data-field="name">Nama</th>
                        <th data-field="price">Nomor HP</th>
                        <th data-field="price">Mata Kuliah</th>
                        <th data-field="price">Status Cetak</th>
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
                                    <a class="waves-effect waves-light light-green darken-2 btn" href="{{ route('sertifikat.print', $orderer->id) }}">Belum tercetak</a>
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
        $(document).ready(function() {
            $('select').material_select();
            $(".button-collapse").sideNav();
        });
    </script>
@endsection

