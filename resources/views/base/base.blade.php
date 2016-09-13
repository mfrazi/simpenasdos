<html>
    <head>
        <title>@yield('title')</title>
        <link href="{{ URL::asset('css/materialize.min.css') }}" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="{{ URL::asset('css/main.css') }}" rel="stylesheet" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="shortcut icon" href="{{ asset('img/icon.png') }}">
        @yield('moreStyles')
        <style>
            html, body {
                height: 100%;
            }
            .wrapper {
                min-height: 100%;
                margin-bottom: -100px;
                padding-bottom: 100px;
            }
            footer {
                height: 100px;
            }
        </style>
    </head>
    <body class="teal darken-1">
        <div class="wrapper">
            @yield('navbar')
            <div>
                @yield('content')
            </div>
        </div>

        <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('js/materialize.min.js') }}"></script>
        <script>
            $(document).ready(function () {
                $(".button-collapse").sideNav();
            });
        </script>
        @include('base.footer')
        @yield('moreScripts')
    </body>
</html>