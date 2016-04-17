@extends('base.base')

@section('title', 'Pesan Sertifikat')

@section('navbar')
    @include('base.navbarUmum')
@endsection

@section('content')
    <br />
    <br />
    <div class="row container">
        @if(Session::has('success') || Session::has('fail'))
            <div class="row center">
                <div class="col s10 push-s1 m6 push-m3 l12">
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

        <form class="col s10 push-s1 m8 push-m2 l8 push-l2 white z-depth-2" method="POST" action="{{ route('sertifikat.submitNRP') }}" enctype="multipart/form-data" style="padding:0">
            {{ csrf_field() }}
            <div class="section center white-text blue-grey darken-4">
                <h5>
                    Pesan Sertifikat
                </h5>
            </div>
            <div class="section"></div>
            <div class="row">
                <div class="input-field col s10 push-s1">
                    <input name="NRP" id="nrp" type="text" class="validate" required="" aria-required="true">
                    <label for="nrp">NRP</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s10 push-s1">
                    <button class="btn waves-effect waves-light center light-green darken-2 right" type="submit">
                        Pesan Sertifikat
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('moreScripts')
    <script>
        $(document).ready(function() {$('select').material_select();});
    </script>
@endsection

