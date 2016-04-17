
@extends('base.base')

@section('title', 'Pengumuman')

@section('navbar')
    @include('base.navbarAdmin')
@endsection

@section('content')
<br />
<br />
<div class="container white z-depth-2">
    <div class="section center white-text blue-grey darken-4">
        <h5>
            Pengumuman
        </h5>
    </div>
    <div class="section"></div>
    <div class="row">
        <div class="col s12 m8 l10 push-l1">
            <a class="black-text" href="{{ route('pengumuman.create') }}"><i class="material-icons left light-green-text text-darken-2">queue</i>Buat Pengumuman</a>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m8 l10 push-m2 push-l1">
            @foreach($announs as $announ)
                <div class="z-depth-1">
                    <div class="divider"></div>
                    <div class="orange" style ="padding:3 15">
                        <h3>
                            {{ $announ->title }}
                        </h3>
                    </div>
                    <div style ="padding:3 15">
                        <p>
                            {!! $announ->content !!}
                        </p>
                    </div>
                </div>
                <div class="section"></div>
            @endforeach
        </div>
    </div>
</div>
<div class="section"></div>
@endsection
