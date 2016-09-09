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
            <div class="row">
                <div class="col s12  m8 push-m2 l8 push-l2">
                    <div class="card orange darken-1">
                        <div class="card-content white-text center">
                            <span class="card-title"><strong>Pengumuman Asisten Dosen</strong></span>
                            <div class="card-title center"><strong>{{ $semester }}</strong></div>
                        </div>
                        <div class="card-action white">
                            <div class="row" style="margin-bottom: 0;">
                                <div class="col s6 center-align"><a href="{{ route('download.daftar.asisten') }}">Download Excel</a></div>
                                <div class="col s6 center-align"><a target="_blank" href="{{ route('pengumumanasisten') }}">Lihat Online</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($pendaftaran==1 && $pengumuman==0)
            <div class="row hide-on-large-only">
                <div class="col s12">
                    <div class="card orange darken-1">
                        <div class="card-content teal lighten-5 black-text">
                            <div class="card-title center"><strong>Pendaftaran Asisten Dosen</strong></div>
                            <div class="card-title center"><strong>{{ $semester }}</strong></div>
                            <div class="section"></div>
                            <p class="flow-text" style="text-align: justify;">Pendaftaran asisten dosen dibuka bagi mahasiswa yang telah lulus dengan nilai minimal AB (bukan mengulang) untuk mata kuliah/padanan mata kuliah yang dipilih, dan bersedia menjalankan tugas sebagai asisten dosen antara lain:</p>
                            <ul class="flow-text" style="text-align: justify;">
                                <li style='list-style-type:square; margin-left:10px;'>Menyiapakan Absensi Kelas dan mengembalikannya lagi pada tempatnya</li>
                                <li style='list-style-type:square; margin-left:10px;'>Mendampingi dosen dalam setiap pelaksanaan perkuliahan</li>
                                <li style='list-style-type:square; margin-left:10px;'>Melaksanakan kegiatan responsi dan praktikum perkuliahan</li>
                                <li style='list-style-type:square; margin-left:10px;'>Membantu dosen Evaluasi dan Koreksi tugas-tugas perkuliahan</li>
                                <li style='list-style-type:square; margin-left:10px;'>Melakukan rekapitulasi prosentase kehadiran setiap mahasiswa pada akhir semester dan menyerahkan ke dosen pengajar serta Sekretariat (Sdr. Yudi Mulyono/Soegeng Santoso)</li>
                            </ul>
                        </div>
                        <div class="card-action white">
                            <div class="row" style="margin-bottom: 0;">
                                <div class="col s12 center-align"><a href="{{ route('daftar.create') }}"><strong>Daftar Sekarang</strong></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row hide-on-med-and-down">
                <div class="col s12" style="font-size: 120%;">
                    <div class="card orange darken-1">
                        <div class="card-content teal lighten-5 black-text">
                            <div class="card-title center"><strong>Pendaftaran Asisten Dosen</strong></div>
                            <div class="card-title center"><strong>{{ $semester }}</strong></div>
                            <div class="section"></div>
                            <p style="text-align: justify;">Pendaftaran asisten dosen dibuka bagi mahasiswa yang telah lulus dengan nilai minimal AB (bukan mengulang) untuk mata kuliah/padanan mata kuliah yang dipilih, dan bersedia menjalankan tugas sebagai asisten dosen antara lain:</p>
                            <ul style="text-align: justify;">
                                <li style='list-style-type:square; margin-left:10px;'>Menyiapakan Absensi Kelas dan mengembalikannya lagi pada tempatnya</li>
                                <li style='list-style-type:square; margin-left:10px;'>Mendampingi dosen dalam setiap pelaksanaan perkuliahan</li>
                                <li style='list-style-type:square; margin-left:10px;'>Melaksanakan kegiatan responsi dan praktikum perkuliahan</li>
                                <li style='list-style-type:square; margin-left:10px;'>Membantu dosen Evaluasi dan Koreksi tugas-tugas perkuliahan</li>
                                <li style='list-style-type:square; margin-left:10px;'>Melakukan rekapitulasi prosentase kehadiran setiap mahasiswa pada akhir semester dan menyerahkan ke dosen pengajar serta Sekretariat (Sdr. Yudi Mulyono/Soegeng Santoso)</li>
                            </ul>
                        </div>
                        <div class="card-action white">
                            <div class="row" style="margin-bottom: 0;">
                                <div class="col s12 center-align"><a href="{{ route('daftar.create') }}"><strong>Daftar Sekarang</strong></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(count($announcements)>0)
            <h4 class="white-text center-align">Pengumuman</h4>
            <div class="divider"></div>
        @endif

        <br/>
        <div class="row  ">
            <div class="col s12 l10 push-l1">
                @foreach($announcements as $announcement)
                    <div class="white">
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
    @include('base.footer')
    <script>
        $(document).ready(function () {
            $('.modal-trigger').leanModal();
        });
    </script>
@endsection