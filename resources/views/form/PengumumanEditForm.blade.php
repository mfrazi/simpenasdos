@extends('base.base')

@section('title', 'Buat Pengumuman')

@section('moreStyles')
    <script src="{{ URL::asset('tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector:'textarea',
            height : "300"
        });
    </script>
    <script src="{{ URL::asset('sweetalert/sweetalert.min.js') }}"></script>
    <link href="{{ URL::asset('sweetalert/sweetalert.css') }}" rel="stylesheet" />
@endsection

@section('navbar')
    @include('base.navbarAdmin')
@endsection

@section('content')
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
    <div class="row container white z-depth-2">
        <div class="section center white-text blue-grey darken-4">
            <h5>
                Buat Pengumuman
            </h5>
        </div>
        <form class="col s10 push-s1" method="POST" action="{{ route('pengumuman.update', ['id' => $data->id]) }}"  enctype="multipart/form-data" files="true" style="padding:0">
            {{ csrf_field() }}
            <div class="row">
                <div class="section"></div>
                <div class="input-field col s12 m10 l12">
                    <input value="{{ $data->title }}" name="title" id="title" type="text" class="validate" required="" aria-required="true"/>
                    <label for="title">Judul</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <textarea cols="10" name="content">{{ $data->content }}</textarea>
                </div>
            </div>
            <div class="file-field input-field">
                <div class="btn light-green darken-2">
                    <span>Sisipan</span>
                    <input name="file[]" type="file" multiple="">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            <div>
                @foreach($path as $p)
                    <div>
                        <a class="teal-text text-darken-1" href="{{ route('sisipan.download', ['name' => $p]) }}">
                            <i class="material-icons">description</i>{{ explode('pengumumanxasdfmnb',$p)[1] }}
                        </a>
                        <a class="teal-text text-darken-1 delete_button" href="{{ route('sisipan.destroy', ['name' => $p]) }}">
                            <i class="small material-icons right-align red-text">delete</i>
                        </a>
                    </div>
                @endforeach
            </div>
            <br/>
            <div class="row">
                <div class="input-field col s12">
                    <a href="{{ route('pengumuman.index') }}"}} class="btn waves-effect orange darken-2 accent-2 left">
                        Kembali
                    </a>
                    <button class="btn waves-effect waves-light light-green darken-2 right" type="submit">
                        Ubah
                    </button>
                </div>
            </div>
            <br />
        </form>
    </div>
    <br />
    <br />
@endsection
@section('moreScripts')
    <script>
        $('.delete_button').click(function(e){
            e.preventDefault();
            var href = $(this).attr('href');
            swal({
                title: "Apakah anda yakin?",
                text: "Sisipan yang dihapus tidak akan bisa dikembalikan lagi",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: "Batal",
                confirmButtonColor: "#F44336",
                confirmButtonText: "Ya, hapus sisipan !",
                closeOnConfirm: false
            }, function(isConfirm){
                if (isConfirm){
                    window.location.href = href;
                }
            });
        });
    </script>
@endsection