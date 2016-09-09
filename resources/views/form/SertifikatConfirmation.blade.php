@extends('base.base')

@section('title', 'Konfirmasi Pemesanan Sertifiakt')

@section('navbar')
    @include('base.navbarUmum')
@endsection

@section('content')
    <br/>
    <br/>
    <div class="container white z-depth-2">
        <div class="row">
            <div class="col s12">
                <div class="section center white-text blue-grey darken-4">
                    <h5>
                        Daftar Kelas Asisten
                    </h5>
                </div>
            </div>
        </div>
        <div class="section"></div>
        <div class="row">
            @foreach($assistedClassrooms as $assistedClassroom)
                <div class="col s10 push-s1 m5 push-m1">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            {{ $assistedClassroom->classroom->name  }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <form class="col s10 push-s1" method="POST" action="{{ route('sertifikat.order') }}"
                  enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="NRP" value={{ $nrp }}>
                <button class="btn waves-effect waves-light center right light-green darken-2" type="submit">
                    Pesan Sertifikat
                </button>
            </form>
        </div>
        <div class="row"> </div>
    </div>
@endsection

@section('moreScripts')
    <script>
        $(document).ready(function () {
            $('select').material_select();
            $(".button-collapse").sideNav();
        });
    </script>
@endsection

