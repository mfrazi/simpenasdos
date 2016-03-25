
@extends('base.base')

@section('title', 'Pengumuman')

@section('navbar')
    @include('base.navbarAdmin')
@endsection

@section('content')
<br />
<br />
<div class="container">
    <div class="row">
        <a class="black-text" href="{{ route('pengumuman.create') }}"><i class="material-icons left">note_add</i>Buat Pengumuman</a>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col s12 m8 l8 push-m2 push-l2">
        </div>
    </div>
</div>
@endsection
