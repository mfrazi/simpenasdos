@extends('base.base')

@section('title', 'Kelas')

@section('navbar')
    @include('base.navbarAdmin')
@endsection

@section('content')
<br />
<br />
<div class="container">
    <form method="POST" action="{{ route('kelas.update') }}">
        {{ csrf_field() }}
        @foreach($kelas as $k)
            <div class="row">
                <div class="input-field col s12 m8 l8">
                    <input name="{{ 'kelasiini'.$k->id }}" value="{{ $k->name }}" type="text" readonly></input>
                    <label>Kelas</label>
                </div>
                <div class="input-field col s12 m4 l4">
                    <select id="dosen" name="{{ $k->id.'dosen[]' }}" multiple>
                        <option value="" disabled selected>Daftar Dosen</option>
                        <?php $tmp=""; ?>
                        @foreach($k->classuser as $u)
                            <?php  $tmp = $u->user_id; ?>
                        @endforeach
                        @foreach($dosen as $d)
                            @if($tmp == $d->id)
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
        @endforeach

        <a href="{{ route('kelas.index') }}"}} class="btn waves-effect red accent-2 left">
            Kembali
        </a>
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
