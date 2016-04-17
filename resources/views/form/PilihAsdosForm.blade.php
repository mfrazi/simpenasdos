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
        <div class="input-field col s12 m12 l10 push-l1">
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
        <div class="col l10 push-l1">
            <table class="responsive-table highlight">
                <thead class="orange darken-2">
                    <tr>
                        <th data-field="name">Nama</th>
                        <th data-field="NRP">NRP</th>
                        <th data-field="IPK">IPK</th>
                        <th data-field="IPK">Nilai Kelas</th>
                        <th data-field="trankrip">Trankrip</th>
                        <th data-field="status">Status</th>
                    </tr>
                </thead>

                <tbody id="registrantresult">
                </tbody>
            </table>
        </div>
    </div>
    <div class="section"></div>
</div>
@endsection

@section('moreScripts')
<script>
$(document).ready(function(){
    $('select').material_select();
    $.ajaxSetup({
        headers:{
            'X-CSRF-Token': $('input[name="_token"]').val()
        }
    });

    $("#classroom").change( function() {
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value;
        var route = '{{ route("pilihasdos.registrant", ":id") }}';
        route = route.replace(':id', valueSelected);
        $.ajax({
            url: route,
            type: 'GET',
            success: function(data){
                $('#registrantresult').empty();
                $.each(data, function(index, element) {
                    var trankriproute = '{{ route("pilihasdos.trankrip", ":id") }}';
                    trankriproute = trankriproute.replace(':id', element.id);
                    var trankrip =  "<td>"+
                                        "<a href='"+trankriproute+"'><i class='material-icons light-green-text text-darken-2'>description</i></a>"+
                                    "</td>";
                    var status = "";
                    if(element.status==0)
                        status =    "<td id='status'>"+
                                        "<input type='checkbox' id='status_"+element.id+"'/>"+
                                        "<label for='status_"+element.id+"'>Diterima</label>"+
                                    "</td>";
                    else
                        status =    "<td id='status'>"+
                                        "<input type='checkbox' id='status_"+element.id+"' checked='checked'/>"+
                                        "<label for='status_"+element.id+"'>Diterima</label>"+
                                    "</td>";
                    $('#registrantresult').append(
                        '<tr>'+
                            '<td>'+element.name+'</td>'+
                            '<td>'+element.NRP+'</td>'+
                            '<td>'+element.gpa+'</td>'+
                            '<td>'+element.mark+'</td>'+
                            trankrip+
                            status+
                        '</tr>'
                    );
                });
            }
        });
    });
});

$(document).on('change', 'input:checkbox', function() {
    $.ajax({
        url: '{{ route('pilihasdos.update') }}',
        type: 'POST',
        data: { id : $(this).attr("id")  }
    });
});
</script>
@endsection
