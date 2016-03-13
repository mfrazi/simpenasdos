<html>
    <head>
        <title>@yield('title')</title>
        <link href="{{ URL::asset('css/materialize.min.css') }}" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        @yield('moreStyles')
    </head>
    <body>

        <div>
            @yield('content')
        </div>

        <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('js/materialize.min.js') }}"></script>
        @yield('moreScripts')
    </body>
</html>
