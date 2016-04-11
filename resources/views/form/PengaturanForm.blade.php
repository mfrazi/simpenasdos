@extends('base.base')

@section('title', 'Pengaturan')

@section('navbar')
    @include('base.navbarAdmin')
@endsection

@section('content')
<br />
<br />
<div class="row container">
    @if(Session::has('success') || Session::has('fail'))
        <div class="row center">
            <div class="col s10 push-s1 m6 push-m3 l6 push-l3">
                @if(Session::has('success'))
                <div class="card-panel light-blue">
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

    <form class="col s10 push-s1 m8 push-m2 l6 push-l3" method="POST" action="{{ route('pengaturan.update') }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="input-field col s12 m12 l12">
                <select id="semester" name="semester">
                    @foreach($semesters as $semester)
                        @if($semester->id == $setting->semester_id)
                            <option value="{{ $semester->id }}" selected="selected">{{ $semester->name }}</option>
                        @else
                            <option value="{{ $semester->id }}">{{ $semester->name }}</option>
                        @endif
                    @endforeach
                </select>
                <label>
                    Semester Aktif
                </label>
            </div>
        </div>

        <div class="row">
            <div class="col s12 m12 l12">
                <div class="light-blue-text">
                    Pendaftaran
                </div>
                <div class="switch">
                    <label>
                        Tutup
                        @if( $setting->status_pendaftaran == 1)
                            <input name="status_pendaftaran" type="checkbox" checked="checked">
                        @else
                            <input name="status_pendaftaran" type="checkbox">
                        @endif
                        <span class="lever"></span>
                        Buka
                    </label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12 m12 l12">
                <p class="light-blue-text">
                    Pengumuman Penerimaan Asisten
                </p>
                <div class="switch">
                    <label>
                        Tutup
                        @if( $setting->status_pengumuman == 1)
                            <input name="status_pengumuman" type="checkbox" checked="checked">
                        @else
                            <input name="status_pengumuman" type="checkbox">
                        @endif
                        <span class="lever"></span>
                        Buka
                    </label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12 m12 l12">
                <p class="light-blue-text">
                    Kaprodi memilih Asisten Dosen
                </p>
                <div class="switch">
                    <label>
                        Tutup
                        @if( $setting->status_kaprodi == 1)
                            <input name="status_kaprodi" type="checkbox" checked="checked">
                        @else
                            <input name="status_kaprodi" type="checkbox">
                        @endif
                        <span class="lever"></span>
                        Buka
                    </label>
                </div>
            </div>
        </div>

        <br/>
        <br/>
        <button id="submitButton" class="btn waves-effect light-blue right" type="submit">
            Ubah
        </button>
    </form>
</div>
@endsection

@section('moreScripts')
<script>
    $(document).ready(function(){
        $('select').material_select();
    });
</script>
@endsection
