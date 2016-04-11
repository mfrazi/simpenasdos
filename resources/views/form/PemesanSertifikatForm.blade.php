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
            <table class="striped">
                <thead>
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
                                <a class="waves-effect waves-light btn" href="{{ route('sertifikat.print', $orderer->id) }}">cetak</a>
                            @endif
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>


    </div>


    {{--<br />--}}
    {{--<br />--}}
    {{--<div class="row container">--}}
        {{--@if(Session::has('success') || Session::has('fail'))--}}
            {{--<div class="row center">--}}
                {{--<div class="col s10 push-s1 m6 push-m3 l6 push-l3">--}}
                    {{--@if(Session::has('success'))--}}
                        {{--<div class="card-panel light-blue">--}}
                            {{--<span class="white-text">{{ Session::get('success') }}</span>--}}
                        {{--</div>--}}
                    {{--@endif--}}
                    {{--@if(Session::has('fail'))--}}
                        {{--<div class="card-panel red accent-2">--}}
                            {{--<span class="white-text">{{ Session::get('fail') }}</span>--}}
                        {{--</div>--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--@endif--}}

        {{--<form class="col s10 push-s1 m8 push-m2 l8 push-l2" method="POST" action="{{ route('sertifikat.submitNRP') }}" enctype="multipart/form-data">--}}
            {{--{{ csrf_field() }}--}}
            {{--<div class="row">--}}
                {{--<div class="input-field col s12">--}}
                    {{--<input name="NRP" id="nrp" type="text" class="validate" required="" aria-required="true">--}}
                    {{--<label for="nrp">NRP</label>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<button class="btn waves-effect waves-light center" type="submit">--}}
                {{--Pesan Sertifikat--}}
            {{--</button>--}}
        {{--</form>--}}
    {{--</div>--}}
@endsection

@section('moreScripts')
    <script>
        $(document).ready(function() {$('select').material_select();});
    </script>
@endsection
