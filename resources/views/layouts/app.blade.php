<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="INSPIRO" />
    <meta name="description" content="Themeforest Template Polo, html template">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png') }}" href="{{ asset('assets/images/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Document title -->
    <title>Procont @hasSection('title') - @yield('title') @endif</title>
    <!-- Stylesheets & Fonts -->
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    @stack('styles')
</head>

<body>

<!-- Main Content -->
<div class="body-inner">
    <!-- Header Component -->
    @include('components.header')

    @yield('content')
</div>

<!-- Footer Component -->
@include('components.footer')

<a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
<!--Plugins-->
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>

<!--Template functions-->
<script src="{{ asset('assets/js/functions.js') }}"></script>
@stack('scripts')
</body>
</html>
