@extends('base.base')

@section('title', 'Dosen')

@section('navbar')
    @include('base.navbarAdmin')
@endsection

@section('moreStyles')
    <script src="{{ URL::asset('sweetalert/sweetalert.min.js') }}"></script>
    <link href="{{ URL::asset('sweetalert/sweetalert.css') }}" rel="stylesheet" />
@endsection

@section('content')
<br />
<br />

@if(Session::has('success'))
    <div class="row center">
        <div class="col s12 m6 push-m3 l6 push-l3">
            @if(Session::has('success'))
            <div class="card-panel red accent-2">
                <span class="white-text">{{ Session::get('success') }}</span>
            </div>
            @endif
        </div>
    </div>
@endif

<div class="containter">
    <div class="row">
        <div class="col s12 m10 push-m1">
            <div class="white z-depth-2">
                <div class="section center white-text blue-grey darken-4">
                    <h5>
                        Data Dosen
                    </h5>
                </div>
                <div class="section"></div>
                <div class="row">
                    <div class="col s12 m10 push-m1">
                        <div class ="row">
                            <div class="col s12 m6 l5">
                                <a class="waves-effect waves-light light-green darken-2 btn" href="{{ route('dosen.create') }}">
                                    <i class="hide-on-med-and-down material-icons left">queue</i>
                                    Tambah Dosen
                                </a>
                            </div>
                        </div>
                        <table class="bordered responsive-table">
                            <thead class="white-text orange darken-2 hide-on-med-and-down">
                            <tr>
                                <th class="center" rowspan="2">Nama</th>
                                <th class="center" rowspan="2">NIP</th>
                                <th class="center" rowspan="2">Username</th>
                                <th class="center" colspan="2">Action</th>
                            </tr>
                            <tr>
                                <th class="center">Ubah</th>
                                <th class="center">Hapus</th>
                            </tr>
                            </thead>

                            <thead class="white-text orange darken-2 hide-on-large-only">
                            <tr>
                                <th class="center">Nama</th>
                                <th class="center">NIP</th>
                                <th class="center">Username</th>
                                <th class="center">Ubah</th>
                                <th class="center">Hapus</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->NIP }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td><a href="{{ route('dosen.edit', ['dosen' => $user->id]) }}"><i class="material-icons light-green-text text-darken-2">mode_edit</i></a></td>
                                    <td><a class="red-text delete_button" href="{{ route('dosen.destroy', ['dosen' => $user->id]) }}"><i class="material-icons">delete</i></a></td>
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
</div>

@endsection
@section('moreScripts')
    <script>
        $('.delete_button').click(function(e){
            e.preventDefault();
            var href = $(this).attr('href');
            swal({
                title: "Apakah anda yakin?",
                text: "Data dosen yang dihapus tidak akan dapat digunakan lagi",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: "Batal",
                confirmButtonColor: "#F44336",
                confirmButtonText: "Ya, hapus dosen !",
                closeOnConfirm: false
            }, function(isConfirm){
                if (isConfirm){
                    window.location.href = href;
                }
            });
        });
    </script>
@endsection