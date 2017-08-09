<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @stack('styles')
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="{{ Request::is('internal/login') ? 'gray-bg' : 'md-skin fixed-sidebar no-skin-config'  }}">
    <div id="wrapper">
        @if(Request::is('internal/login'))
          @yield('content_admin_login')
        @else
          @include('admin.partials.sidebar')

          <div id="page-wrapper" class="gray-bg">
              @include('admin.partials.top_navigation')

              @yield('page-heading')

              @include('admin.partials.massages')

              @yield('content')

              <div class="footer">
                  <div class="pull-right">
                      10GB of <strong>250GB</strong> Free.
                  </div>
                  <div>
                      <strong>Copyright</strong> Example Company &copy; 2014-2017
                  </div>
              </div>
          </div>
        @endif



    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>


    <script src="{{ asset('js/inspinia.js') }}"></script>
    <script src="{{ asset('js/pace.min.js') }}"></script>

    @stack('scripts')

    <script>
        $(window).bind("load", function () {
            if ($("body").hasClass('fixed-sidebar')) {
                $('.sidebar-collapse').slimScroll({
                    height: '100%',
                    railOpacity: 0.9
                });
            };
            $('.summernote').summernote({
                height: 200,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['paragraph', ['style', 'ol', 'ul','paragraph']],
                    ['insert', ['picture', 'link', 'video', 'table']],

                ]
            })
        });


    </script>


</body>
</html>
