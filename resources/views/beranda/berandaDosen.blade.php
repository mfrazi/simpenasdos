@extends('base.base')

@section('title', 'Beranda')

@section('navbar')
    @include('base.navbarDosen')
@endsection
@section('moreScripts')
    <script>
        $(document).ready(function () {
            $(".button-collapse").sideNav();
        });
    </script>
@endsection