
@extends('base.base')

@section('title', 'Pengumuman')

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
        <div class="col s10 push-s1 m6 push-m3 l6 push-l3">
            <div class="card-panel orange darken-2">
                <span class="white-text">{{ Session::get('success') }}</span>
            </div>
        </div>
    </div>
@endif
@if(Session::has('destroy'))
    <div class="row center">
        <div class="col s10 push-s1 m6 push-m3 l6 push-l3">
            <div class="card-panel orange darken-2">
                <span class="white-text">{{ Session::get('destroy') }}</span>
            </div>
        </div>
    </div>
@endif
<div class="container white z-depth-2">
    <div class="section center white-text blue-grey darken-4">
        <h5>
            Pengumuman
        </h5>
    </div>
    <div class="section"></div>
    <div class="row">
        <div class="col s10 push-s1">
            <div class ="row">
                <div class="col s12 m7 l6">
                    <a class="waves-effect waves-light light-green darken-2 btn" href="{{ route('pengumuman.create') }}"><i class="material-icons left hide-on-med-and-down">queue</i>Buat Pengumuman</a>
                </div>
            </div>
            @foreach($announs as $announ)
                <div class="z-depth-1">
                    <div class="divider"></div>
                    <div class="orange white-text" style ="padding:3px 15px;">
                        <h5>
                            <div class="row">
                                <div class="col s12 m10">
                                    {{ $announ->title }}
                                </div>
                                <div class="col s12 section hide-on-med-and-up"><br/></div>
                                <div class="col s12 m2">
                                    <a href="{{ route('pengumuman.destroy', ['id' => $announ->id]) }}" class="red-text material-icons right delete_button">delete</a>
                                    <a style="padding-right: 5px;" href="{{ route('pengumuman.edit', ['id' => $announ->id]) }}" class="white-text material-icons right">mode_edit</a>
                                </div>
                            </div>
                        </h5>
                    </div>
                    <div style ="padding:3px 15px">
                        <p>
                            {!! $announ->content !!}
                        </p>
                    </div>
                    <div style ="padding:4px 15px 7px 15px">
                        @foreach($path[(int)($announ->id)] as $p)
                            <div>
                                <a class="teal-text text-darken-1" href="{{ route('sisipan.download', ['name' => $p]) }}">
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
<div class="section"></div>
@endsection
@section('moreScripts')
    <script>
        $('.delete_button').click(function(e){
            e.preventDefault();
            var href = $(this).attr('href');
            swal({
                title: "Apakah anda yakin?",
                text: "Pengumuman yang dihapus tidak akan ditampilkan lagi",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: "Batal",
                confirmButtonColor: "#F44336",
                confirmButtonText: "Ya, hapus pengumuman !",
                closeOnConfirm: false
            }, function(isConfirm){
                if (isConfirm){
                    window.location.href = href;
                }
            });
        });
    </script>
@endsection