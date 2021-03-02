<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta -->
    <meta charset="utf-8" />

    <meta name="description" content="Responsive, Bootstrap, BS4" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Title -->
    <title>NVSERVICES POS</title>

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Font awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" type="text/css" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" type="text/css" />


    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css" />
    <script src="{{ asset('js/app.js') }}"></script>

    @livewireStyles

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets/plugins/popper.js/popper.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/pace-progress/pace.min.js')}}"></script>
    <script src="{{ asset('assets/js/nav.js')}}"></script>
    <script src="{{ asset('js/toastr.js') }}"></script>

</head>

<body>
    <div class="app" id="app">
        <!-- Aside -->
        @include('includes.sidebar')
        <!-- Content -->
        <div id="content" class="app-content box-shadow-0" role="main">

            <!-- Header -->
            @include('includes.topnav')

            <!-- Main -->
            <div class="container " style="margin-top: 20px">
                {{ $slot }}
            </div>

            <!-- Footer -->
            @include('includes.footer')
        </div>
        @include('includes.theme')
    </div>

    <!-- Plugins -->

    {{-- <script src="{{ asset('assets/plugins/pjax/pjax.js')}}"></script> --}}
    <script src="{{ asset('assets/js/lazyload.config.js')}}"></script>
    <script src="{{ asset('assets/js/lazyload.js')}}"></script>
    <script src="{{ asset('assets/js/plugin.js')}}"></script>
    <script src="{{ asset('js/scrollto.js')}}"></script>
    <script src="{{ asset('assets/js/toggleclass.js')}}"></script>
    <script src="{{ asset('assets/js/theme.js')}}"></script>
    {{-- <script src="{{ asset('assets/js/ajax.js')}}"></script> --}}
    <script src="{{ asset('assets/js/app.js')}}"></script>
    @livewireScripts
    <script>
        window.livewire.on('alert', param => {
            toastr[param['type']](param['message']);
        });
    </script>
    <script src="{{ asset('js/wireturbolinks.js') }}" data-turbolinks-eval="false"></script>
    @stack('js')
</body>

</html>
