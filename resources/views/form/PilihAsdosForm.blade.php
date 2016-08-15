@extends('base.base')

@section('title', 'Penerimaan Asisten Dosen')

@section('navbar')
    @include('base.navbarDosen')
@endsection

@section('content')
<br />
<br />

@if(Session::has('success'))
    <div class="row center">
        <div class="col s10 push-s1 m6 push-m3 l6 push-l3">
            @if(Session::has('success'))
            <div class="card-panel red accent-2">
                <span class="white-text">{{ Session::get('success') }}</span>
            </div>
            @endif
        </div>
    </div>
@endif

<div class="container white">
    {{ csrf_field() }}
    <div class="section center white-text blue-grey darken-4">
        <h5>
            Penerimaan Asisten Dosen
        </h5>
    </div>
    <div class="section"></div>
    <div class="row">
        <div class="input-field col s10 push-s1">
            <select id="classroom">
                <option value="" disabled selected>Daftar kelas</option>
                @foreach($classrooms as $classroom)
                <option id="{{ $classroom->id }}" value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                @endforeach
            </select>
            <label>
                Pilih Kelas
            </label>
        </div>
    </div>
    <div class="row">
        <div class="col s12 l10 push-l1">
            <div class="row">
                <div class="col s10 push-s1 l12">
                    <i>* Silakan centang pada kolom status untuk memilih asisten dosen</i>
                    <div class="section"></div>
                </div>
                <table class="col s10 push-s1 l12 responsive-table bordered">
                    <thead class="orange darken-2 white-text">
                    <tr>
                        <th data-field="name">Nama</th>
                        <th data-field="NRP">NRP</th>
                        <th data-field="phone_number">No.HP</th>
                        <th data-field="IPK">IPK</th>
                        <th data-field="mark">Nilai MK</th>
                        <th data-field="trankrip">Trankrip</th>
                        @if($pilih == 1)
                            <th data-field="status">Status</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody id="registrantresult">
                    </tbody>
                </table>
                <div class="col s12 center" id="loading" style="display: none;">
                    <img src="{{ URL::asset('img/ring.svg') }}"/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('moreScripts')
<script>
$(document).ready(function(){
    $('select').material_select();
    $(".button-collapse").sideNav();
    $.ajaxSetup({
        headers:{
            'X-CSRF-Token': $('input[name="_token"]').val()
        }
    });

    $("#classroom").change( function() {
        $('#registrantresult').empty();
        var valueSelected = this.value;
        var route = '{{ route("pilihasdos.registrant", ":id") }}';
        route = route.replace(':id', valueSelected);
        $.ajax({
            url: route,
            beforeSend: function() { $('#loading').show(); },
            complete: function() { $('#loading').hide(); },
            type: 'GET',
            success: function(data){
                $.each(data, function(index, element) {
                    var trankriproute = '{{ route("pilihasdos.trankrip", ":id") }}';
                    trankriproute = trankriproute.replace(':id', element.id);
                    var trankrip =  "<td>"+
                                        "<a target='_blank' href='"+trankriproute+"'><i class='material-icons light-green-text text-darken-2'>description</i></a>"+
                                    "</td>";
                    var status = "";
                    if(element.status==0)
                        status =    "<td id='status'>"+
                                        "<input type='checkbox' id='status_"+element.id+"'/>"+
                                        "<label for='status_"+element.id+"'>Diterima</label>"+
                                        "<img style='padding-left:10px; display: none;' height='20' widht='20' id='loader_status_"+element.id+"' src=\"{{ URL::asset('img/ring.svg') }}\">"+
                                    "</td>";
                    else
                        status =    "<td id='status'>"+
                                        "<input type='checkbox' id='status_"+element.id+"' checked='checked'/>"+
                                        "<label for='status_"+element.id+"'>Diterima</label>"+
                                        "<img style='padding-left:10px; display: none;' height='20' widht='20' id='loader_status_"+element.id+"' src=\"{{ URL::asset('img/ring.svg') }}\">"+
                                    "</td>";
                    $('#registrantresult').append(
                        '<tr>'+
                            '<td>'+element.name+'</td>'+
                            '<td>'+element.NRP+'</td>'+
                            '<td>'+element.phone_number+'</td>'+
                            '<td>'+element.gpa+'</td>'+
                            '<td>'+element.mark+'</td>'+
                            trankrip+
                            @if($pilih == 1)
                                status
                            @endif
                            +
                        '</tr>'
                    );
                });
                if(data.length==0){
                    $('#registrantresult').append(
                        '<tr>'+
                            '<td class="center-align" colspan="6">Tidak ada calon asisten untuk kelas ini</td>'+
                        '</tr>'
                    );
                }
            }
        });
    });
});

$(document).on('change', 'input:checkbox', function() {
    var loader = '#loader_'+$(this).attr("id");
    $.ajax({
        url: '{{ route('pilihasdos.update') }}',
        beforeSend: function() { $(loader).show(); },
        complete: function() { $(loader).hide(); },
        type: 'POST',
        data: { id : $(this).attr("id")  }
    });
});
</script>
@endsection
