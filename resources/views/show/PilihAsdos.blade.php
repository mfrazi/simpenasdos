@extends('base.base')

@section('title', 'Penerimaan Asisten Dosen')

@section('navbar')
    @include('base.navbarDosen')
@endsection

@section('content')
<br />
<br />

@if(Session::has('success'))
    <div class="row center">
        <div class="col s10 push-s1 m6 push-m3 l6 push-l3">
            @if(Session::has('success'))
            <div class="card-panel red accent-2">
                <span class="white-text">{{ Session::get('success') }}</span>
            </div>
            @endif
        </div>
    </div>
@endif

<div class="container">
    <div class="row">
        <a class="black-text" href="{{ route('dosen.create') }}"><i class="material-icons left">add</i>Tambah Dosen</a>
    </div>
</div>
<div class="container">
    <table class="responsive-table highlight">
        <thead>
            <tr>
                <th data-field="name" rowspan="2">Nama</th>
                <th data-field="NRP" rowspan="2">NRP</th>
                <th data-field="IPK" rowspan="2">IPK</th>
                <th data-field="classroom" rowspan="2">Kelas</th>
                <th class="center"data-field="status" colspan="2">Status</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($registrants as $registrant)
                <tr>
                    <td>{{ $registrant->name }}</td>
                    <td>{{ $registrant->NRP }}</td>
                    <td>{{ $registrant->gpa }}</td>
                    <td>{{ $registrant->classroom->name }}</td>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
