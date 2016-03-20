@extends('base.base')

@section('title', 'Kelas')

@section('navbar')
    @include('base.navbarAdmin')
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
        <a class="black-text" href="{{ route('kelas.create') }}"><i class="material-icons left">note_add</i>Tambah Kelas</a>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col s12 m8 l8 push-m2 push-l2">
            @foreach($kelas as $k)
            <a href="{{ route('kelas.show', ['kelas' => $k->matkul_id]) }}">
                <div class="card-panel light-blue darken-1">
                    <span class="white-text">
                        {{ $k->matkul->name }}
                    </span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
