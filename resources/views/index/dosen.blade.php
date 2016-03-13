<!-- id
nama
NIP
username
password
fk role -->
@extends('base.base')

@section('title', 'Dosen')

@section('navbar')
    @include('base.navbarAdmin')
@endsection

@section('content')
<br />
<br />
<div class="container">
    <div class="row">
        <a class="black-text" href="{{ route('tambahdosen') }}"><i class="material-icons left">note_add</i>Tambah Dosen</a>
    </div>
</div>
<div class="container">
    <table class="responsive-table highlight">
        <thead>
            <tr>
                <th data-field="id" rowspan="2">Nama</th>
                <th data-field="name" rowspan="2">NIP</th>
                <th data-field="price" rowspan="2">Username</th>
                <th class="center"data-field="price" colspan="2">Action</th>
            </tr>
            <tr>
                <th class="center">Edit</th>
                <th class="center">Hapus</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->NIP }}</td>
                    <td>{{ $user->username }}</td>
                    <td class="center"><a href="{{ route('ubahdosen', ['id' => $user->id]) }}"><i class="material-icons">mode_edit</i></a></td>
                    <td class="center"><a href="{{ route('hapusdosen', ['id' => $user->id]) }}"><i class="material-icons">delete</i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection