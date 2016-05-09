@extends('base.base')

@section('title', 'Asisten Dosen')

@section('navbar')
    @include('base.navbarUmum')
@endsection

@section('content')
    <br/>
    <br/>
    <div class="row container">
        @if($pengumuman == 1)
            <div class="row center">
                <div class="col s10 push-s1 m6 push-m3 l6 push-l3">
                    <div class="card-panel orange darken-2">
                    <span class="white-text">
                        <a class="white-text" href="{{ route('download.daftar.asisten') }}">
                            Pengumuman Daftar Asisten
                        </a>
                    </span>
                    </div>
                </div>
            </div>
        @endif


        <div class="row  ">
            <div class="col s10 push-s1">
                @foreach($announcements as $announcement)
                    <div class="white">
                        <div class="divider"></div>
                        <div class="orange white-text" style="padding:3px 15px 3px 15px">
                            <h5>
                                {{ $announcement->title }}
                            </h5>
                        </div>
                        <div style="padding:3px 15px">
                            <p>
                                {!! $announcement->content !!}
                            </p>
                        </div>
                        <div style="padding:4px 15px 7px 15px">
                            @foreach($path[(int)($announcement->id)] as $p)
                                <div>
                                    <a class="teal-text text-darken-1"
                                       href="{{ route('sisipan.download', ['name' => $p]) }}">
                                        <i class="material-icons">description</i>{{ explode('pengumumanxasdfmnb',$p)[1] }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="section"></div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('moreScripts')
    <script>
        $(document).ready(function () {
            $(".button-collapse").sideNav();
        });
    </script>
@endsection