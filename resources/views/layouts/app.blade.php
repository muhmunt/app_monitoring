<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/waves.min.css') }}" rel="stylesheet">
</head>
<script type="text/javascript">
    function startTime() {
              var today = new Date();
              var h = today.getHours();
              var m = today.getMinutes();
              var s = today.getSeconds();
              m = checkTime(m);
              s = checkTime(s);
              document.getElementById('txt').innerHTML =
              h + ":" + m + ":" + s;
              var t = setTimeout(startTime, 500);
            }
            function checkTime(i) {
              if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
              return i;
            }
</script>
<body onload="startTime()">
    <div id="app">
        @include('layouts.header.index')
        <main class="py-4">
            @yield('content')
        </main>
        @include('layouts.footer.index')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/all.min.js') }}"></script>
    <script src="{{ asset('js/waves.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js') }}"></script>

    <script type="text/javascript">
        Waves.attach('.waves');
        Waves.init();
        $(document).ready(function () {
            $('.dropdown-toggle').dropdown();

            
        });
    </script>
    @yield('scripts')
</body>
</html>
