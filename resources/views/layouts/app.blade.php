<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            line-height: 1.6;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif !important;
        }
        .navbar-nav > li > a {
            line-height: 1.6;
        }
        @if(Request::is('login') || Request::is('register'))
         .footer {
            display: none !important;
        }
        @else
        .footer {
            position: relative !important;
        }
        @endif
    </style>

    @stack('styles-app')

    <!-- Animation CSS -->
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body class="app top-navigation  {{ Auth::guest() ? 'guest gray-bg' : '' }}">

@if(Request::is('login') || Request::is('register'))

    @include('partials.user_top-navigation')

    @yield('content-app')

@else
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">

                @include('partials.user_top-navigation')


            <div class="wrapper wrapper-content">

                @yield('content-app')
            </div>

        </div>
    </div>

    @include('partials.app_footer')
@endif



<!-- Mainly scripts -->
<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

<!-- Custom and plugin javascript -->
<script src="{{ asset('js/pace.min.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>

@stack('scripts-app')
<script>
    $(document).ready(function () {

        $('.summernote').summernote({
            height: 200,
            toolbar: [
                ['style', ['bold', 'italic', 'underline']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['paragraph', ['style', 'ol', 'ul','paragraph']],
                ['insert', ['picture', 'link', 'video', 'table']],

            ]
        });
    });

</script>
</body>
</html>
