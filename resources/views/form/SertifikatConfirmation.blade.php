@extends('base.base')

@section('title', 'Konfirmasi Pemesanan Sertifiakt')

@section('navbar')
    @include('base.navbarUmum')
@endsection

@section('content')
    <br/>
    <br/>

    <div class="row container">
        <h3>Daftar Kelas Asisten</h3>
        @foreach($assistedClassrooms as $assistedClassroom)
            <div class="col s12 m6">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        {{ $assistedClassroom->classroom->name  }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row container">
        <form class="col s12 m12 l12" method="POST" action="{{ route('sertifikat.order') }}"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="NRP" value={{ $nrp }}>
            <button class="btn waves-effect waves-light center" type="submit">
                Pesan Sertifikat
            </button>
        </form>
    </div>
@endsection

@section('moreScripts')
    <script>
        $(document).ready(function () {
            $('select').material_select();
        });
    </script>
@endsection

