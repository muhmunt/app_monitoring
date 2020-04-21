<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
        .test{
            border-left: 2px #5e72e4 solid;
            background-color: #5e72e4;
            color: #ffffff!important;
        }

        .ln-normal{
            line-height: 1.5!important;
        }

        .bd-dark{
            border: 1px #3b3b3b solid!important;
        }

    </style>

    <link href="{{ asset('assets/argon/js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/argon/js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/argon/css/argon-dashboard.css') }}" rel="stylesheet" />
    <!--   Custom   -->
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/picker.css') }}">
    <!--   Asset   -->
    <link rel="stylesheet" href="{{ asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/argon/css/font-open-sans.css') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/assets/img/logo_compact.png') }}">

    @yield('custom-css')

    <title>@yield('title')</title>

</head>
<script>
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
<body class="" onload="startTime()">

    @include('layouts.element.sidebar')
    <div class="main-content">
        @section('content')

        @show
    </div>

    {{-- all jquery --}}
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!--   Core   -->
    <script src="{{ asset('assets/argon/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/argon/js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/picker.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <!--   Optional JS   -->
    <script src="{{ asset('assets/argon/js/plugins/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/argon/js/plugins/chart.js/dist/Chart.extension.js') }}"></script>
    <!--   Argon JS   -->
    <script src="{{ asset('assets/argon/js/argon-dashboard.min.js') }}"></script>
    <script src="{{ asset('assets/argon/js/track-js.js') }}"></script>
    <!--   Custom   -->
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js') }}"></script>

    @yield('scripts')

</body>
</html>

