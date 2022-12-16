<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta5
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- CSS files -->
    <link href="{{ asset('css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/demo.min.css') }}" rel="stylesheet" />
    @yield('css')
</head>

<body>
    <div class="wrapper">
        @include('layouts.navbar')
        <div class="page-wrapper">
            @yield('content')
            @include('layouts.footer')
        </div>
    </div>
    <!-- Libs JS -->
    <!-- JQuery Libs -->
    <script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <!-- Tabler Core -->
    <script src="{{ asset('js/tabler.min.js') }}"></script>
    <script src="{{ asset('js/demo.min.js') }}"></script>
    @yield('js')
</body>

</html>
