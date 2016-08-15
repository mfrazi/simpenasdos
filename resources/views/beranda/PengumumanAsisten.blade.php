<html>
<head>
    <title>Pengumuman Asisten Dosen</title>
    <link href="{{ URL::asset('css/materialize.min.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="{{ asset('img/icon.png') }}">
</head>
<body>
<div class="row">
    <div class="col s12 m8 push-m2">
        <h4 class="center-align">Pengumuman Asisten Dosen</h4>
        <h4 class="center-align">{{ $semester }}</h4>
        <br/>
        <table class="bordered responsive-table">
            <thead class="orange darken-2 white-text">
            <tr>
                <th data-field="id">NRP</th>
                <th data-field="name">Nama</th>
                <th class="hide-on-med-and-up" data-field="mata_kuliah">MK</th>
                <th class="hide-on-small-only" data-field="mata_kuliah">Mata Kuliah</th>
            </tr>
            </thead>

            <tbody>
            @foreach($assistants as $assistant)
                <tr>
                    <td>{{ $assistant->NRP }}</td>
                    <td>{{ $assistant->name }}</td>
                    <td>{{ $assistant->classroom->name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>