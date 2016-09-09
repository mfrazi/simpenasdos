@extends('base.base')

@section('title', 'Pendaftaran Asisten Dosen')

@section('navbar')
    @include('base.navbarUmum')
@endsection

@section('moreStyles')
    <script src="{{ URL::asset('sweetalert/sweetalert.min.js') }}"></script>
    <link href="{{ URL::asset('sweetalert/sweetalert.css') }}" rel="stylesheet" />
@endsection

@section('content')
<br />
<br />
<div class="row container">
    @if($pendaftaran==1 &&  $pengumuman==0)
    @if(Session::has('success') || Session::has('fail'))
        <div class="row center">
            <div class="col s10 push-s1 m6 push-m3 l10 push-l1">
                @if(Session::has('success'))
                <div class="card-panel orange darken-2">
                    <span class="white-text">{{ Session::get('success') }}</span>
                </div>
                @endif
                @if(Session::has('fail'))
                <div class="card-panel red accent-2">
                    <span class="white-text">{{ Session::get('fail') }}</span>
                </div>
                @endif
            </div>
        </div>
    @endif

    <form id="formValidate" class="row col s12 m10 push-m1 l8 push-l2 white z-depth-2 formValidate" style="padding:0" method="POST" action="{{ route('daftar.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="section center white-text blue-grey darken-4">
            <h5>
                Pendaftaran Asisten Dosen
            </h5>
        </div>
        <div class="section"></div>

        <div class="input-field col s12 m10 push-m1">
            <input name="name" id="name" type="text" data-error=".error-name">
            <label for="name" >Nama</label>
            <div style="font-style: italic;" class="red-text error-name"></div>
        </div>

        <div class="input-field col s12 m10 push-m1">
            <input name="nrp" id="nrp" type="text" data-error=".error-nrp" maxlength="10">
            <label for="nrp">NRP</label>
            <div style="font-style: italic;" class="red-text error-nrp"></div>
        </div>

        <div class="input-field col s12 m10 push-m1">
            <input name="phone_number" id="phone_number" type="text" data-error=".error-phone">
            <label for="phone_number">Nomor HP</label>
            <div style="font-style: italic;" class="red-text error-phone"></div>
        </div>

        <div class="input-field col s12 m10 push-m1">
            <input name="ipk" id="ipk" type="number" data-error=".error-ipk">
            <label for="ipk">IPK</label>
            <div style="font-style: italic;" class="red-text error-ipk"></div>
        </div>

        <div class="col s12 section"><br/></div>

        <div class="col s12 m10 push-m1">
            <input name="pengalaman" type="checkbox" class="filled-in" id="pengalaman" />
            <label for="pengalaman">Memiliki pengalaman menjadi asisten sebelumnya</label>
        </div>

        <div class="col s12 section"><br/></div>
        <div class="col s12 section"><br/></div>

        <div class="col s12 m10 push-m1" style="color: #76b343;">Pilihan 1</div>
        <div class="input-field col s12 m10 push-m1 l7 push-l1">
            <select name="kelas1">
                <option value="" disabled selected>Pilih Kelas</option>
                @foreach($classrooms as $classroom)
                    <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="input-field col s12 m10 push-m1 l3 push-l1">
            <select name="nilai_kelas1">
                <option value="" disabled selected>Nilai MK Pilihan 1</option>
                <option value="A">A</option>
                <option value="AB">AB</option>
            </select>
        </div>

        <div class="col s12 section"><br/></div>
        <div class="col s12 section"><br/></div>

        <div class="col s12 m10 push-m1" style="color: #76b343;">Pilihan 2 (Opsional)</div>
        <div class="input-field col s12 m10 push-m1 l7 push-l1">
            <select name="kelas2">
                <option value="" disabled selected>Pilih Kelas</option>
                @foreach($classrooms as $classroom)
                    <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-field col s12 m10 push-m1 l3 push-l1">
            <select name="nilai_kelas2">
                <option value="" disabled selected>Nilai MK Pilihan 2</option>
                <option value="A">A</option>
                <option value="AB">AB</option>
            </select>
        </div>

        <div class="col s12 section"><br/></div>

        <div class="file-field col s12 m10 push-m1">
            <div class="btn light-green darken-2">
                <span>Transkrip</span>
                <input id="transkrip" name="transkrip" type="file" data-error=".error-transkrip">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <div class="col s12 m10 push-m1">
            <div style="font-style: italic;" class="red-text error-transkrip"></div>
            <br/>
        </div>
        <br/>
        <div class="col s12 m10 push-m1">
            *File transkrip bisa didapatkan di <a target="_blank" href="http://integra.its.ac.id">SI Akademik ITS</a>, silakan download transkrip dalam format Microsoft Word Document <i>(*.doc)</i>
        </div>

        <div class="col s12 section"><br/></div>
        <div class="col s12 m11">
            <button id="submit_button" class="btn waves-effect waves-light center right light-green darken-2" type="submit">
                Daftar
            </button>
        </div>
        <div class="col s12 section"><br/></div>
    </form>
    @else
        <div class="row center">
            <div class="col s10 push-s1 m6 push-m3 l10 push-l1">
                <div class="card-panel orange darken-2">
                    <span class="white-text">Pendaftaran Asisten Dosen Sudah Ditutup</span>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection

@section('moreScripts')
    @include('base.footer')
    <script src="{{ URL::asset('js//jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('js/additional-methods.min.js') }}"></script>
    <script>
        $('#submit_button').on('click',function(e){
            if($('#formValidate').valid()) {
                e.preventDefault();
                var form = $(this).parents('form');
                swal({
                    title: "Daftar menjadi asdos?",
                    text: "Pastikan semua data sudah diisi dan sesuai dengan format",
                    showCancelButton: true,
                    cancelButtonText: "Batal",
                    confirmButtonColor: "#689f38 ",
                    confirmButtonText: "Ya, daftar!",
                    closeOnConfirm: false
                }, function (isConfirm) {
                    if (isConfirm) form.submit();
                });
            }
        })
    </script>
    <script>
        $(document).ready(function() {
            $('select').material_select();
            $(".button-collapse").sideNav();

            $("#formValidate").validate({
                rules: {
                    name: {
                        required: true
                    },
                    nrp: {
                        required: true,
                        digits: true,
                        rangelength: [10,10]
                    },
                    phone_number: {
                        required: true
                    },
                    ipk: {
                        required: true,
                        step: 0.01 ,
                        min: 0,
                        max: 4,
                    },
                    transkrip: {
                        required: true
                    }
                },
                //For custom messages
                messages: {
                    name:{
                        required: "Masukkan nama anda"
                    },
                    nrp:{
                        required: "Masukkan NRP anda",
                        digits: "Format NRP yang anda masukkan salah",
                        rangelength: "Panjang NRP harus 10 digit"
                    },
                    phone_number: {
                        required: "Masukkan nomor HP anda"
                    },
                    ipk: {
                        required: "Masukkan IPK (Indeks Prestasi Kumulatif) anda",
                        min: "Nilai tidak boleh negatif",
                        max: "Nilai tidak boleh lebih dari 4.00",
                        number: "Format IPK yang anda masukkan salah. Contoh IPK 3.67"
                    },
                    transkrip: {
                        required: "Unggah file trankrip yang anda miliki"
                    }

                },
                errorElement : 'div',
                errorPlacement : function(error, element) {
                    var placement = $(element).data('error');
                    if (placement) {
                        $(placement).append(error)
                    } else {
                        error.insertAfter(element);
                    }
                }
            });
        });
    </script>
@endsection
