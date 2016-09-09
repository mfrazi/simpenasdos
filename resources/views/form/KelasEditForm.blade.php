@extends('base.base')

@section('title', 'Kelas')

@section('moreStyles')
    <link href="{{ URL::asset('css/selectize.css') }}" rel="stylesheet" />
    <script src="{{ URL::asset('sweetalert/sweetalert.min.js') }}"></script>
    <link href="{{ URL::asset('sweetalert/sweetalert.css') }}" rel="stylesheet" />
@append

@section('navbar')
    @include('base.navbarAdmin')
@endsection

@section('content')
<br />
<br />
<div class="container">
    @if(Session::has('success'))
        <div class="row center">
            <div class="col s10 push-s1 m6 push-m3 l6 push-l3">
                <div class="card-panel orange darken-2">
                    <span class="white-text">{{ Session::get('success') }}</span>
                </div>
            </div>
        </div>
    @endif

    <form method="POST" action="{{ route('kelas.update') }}" class="col s10 push-s1 m8 push-m2 l6 push-l3 z-depth-2 white">
        {{ csrf_field() }}
        <div class="section center white-text blue-grey darken-4">
            <h5>
                Ubah Kelas
            </h5>
        </div>
        <div class="divider"></div>
        <div class="section"></div>
        @foreach($kelas as $k)
            <div class="row">
                <div class="col s10 push-s1 l1">
                    @if(count($k->classuser)==0 && count($k->registrant)==0)
                        <a href="{{ route('kelas.destroy', ['id' => $k->id]) }}" class="red-text material-icons right delete_button">delete</a>
                    @else
                        &nbsp;
                    @endif
                </div>
                <div class="input-field col s10 l6 push-s1">
                    <input name="{{ 'kelasid'.$k->id }}" value="{{ $k->id }}" type="hidden"/>
                    <input name="{{ 'kelasname'.$k->id }}" value="{{ $k->name }}" type="text" readonly/>
                    <label>Kelas</label>
                </div>
                <div class="input-field col s10 l4 push-s1" style="top: -10%;">
                    <select class="dosen" name="{{ $k->id.'dosen[]' }}" multiple>
                        <option value="" disabled selected>Daftar Dosen</option>
                        <?php $tmp=[]; ?>
                        @foreach($k->classuser as $u)
                            <?php
                                if($u->user_id)
                                    array_push($tmp, $u->user_id);
                            ?>
                        @endforeach
                        @foreach($dosen as $d)
                            @if(in_array($d->id,$tmp))
                                <option value="{{ $d->id }}" selected>{{ $d->name }}</option>
                            @else
                                <option value="{{ $d->id }}">{{ $d->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <label>
                        Pilih Dosen
                    </label>
                </div>
            </div>
            <br/>
        @endforeach
        <div class="row">
            <div class="input-field col s10 m5 push-s1 push-m1 hide-on-small-only">
                <a href="{{ route('kelas.index') }}" class="btn waves-effect orange darken-2 accent-2 left">
                    Kembali
                </a>
            </div>
            <div class="input-field col s10 m5 push-s1 push-m1">
                <button id="submitButton" class="btn waves-effect light-green darken-2 hide-on-med-and-up" type="submit">
                    Ubah
                </button>
                <button id="submitButton" class="btn waves-effect light-green darken-2 right hide-on-small-only" type="submit">
                    Ubah
                </button>
            </div>
            <div class="input-field col s10 m5 push-s1 push-m1 hide-on-med-and-up">
                <a href="{{ route('kelas.index') }}" class="btn waves-effect orange darken-2 accent-2 left">
                    Kembali
                </a>
            </div>
        </div>
        <div class="section"></div>
    </form>
</div>
<br />
<br />
<br />
<br />
@endsection

@section('moreScripts')
<script src="{{ URL::asset('js/selectize.js') }}"></script>
<script>
    $(document).ready(function(){
        $(".button-collapse").sideNav();
        $('.dosen').selectize({
            delimiter: ',',
            persist: false,
            create: function(input) {
                return {
                    value: input,
                    text: input
                }
            }
        });

        $('.delete_button').click(function(e){
            e.preventDefault();
            var href = $(this).attr('href');
            swal({
                title: "Apakah anda yakin?",
                text: "Kelas yang dihapus tidak akan bisa dikembalikan",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: "Batal",
                confirmButtonColor: "#F44336",
                confirmButtonText: "Ya, hapus kelas !",
                closeOnConfirm: false
            }, function(isConfirm){
                if (isConfirm){
                    window.location.href = href;
                }
            });
        });
    });
</script>
@endsection
