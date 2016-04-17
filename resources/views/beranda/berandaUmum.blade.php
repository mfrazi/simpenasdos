@extends('base.base')

@section('title', 'Asisten Dosen')

@section('navbar')
    @include('base.navbarUmum')
@endsection
@section('moreScripts')
    <script>
        $(document).ready(function () {
            $(".button-collapse").sideNav();
        });
    </script>
@endsection