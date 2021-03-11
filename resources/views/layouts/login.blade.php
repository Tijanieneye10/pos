<meta name="description" content="Responsive, Bootstrap, BS4" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Title -->
<title>NVSERVICES POS LOGIN</title>

<link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

<!-- Font awesome -->
<link rel="stylesheet" href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" type="text/css" />

<!-- Bootstrap -->
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" type="text/css" />

<!-- Stylesheet -->
<link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css" />
<script src="{{ asset('js/app.js') }}"></script>
</head>

<body>
    <div class="d-flex flex-column flex">

        <div class="navbar light bg pos-rlt box-shadow">
            <div class="mx-auto">

                <!-- Brand -->
                <a href="index.html" class="navbar-brand">
                    <img src="{{ asset('assets/images/logo.svg') }}" alt="Logo" />
                    <span class="hidden-folded d-inline">NVSERVICES</span>
                </a>

            </div>
        </div>

        <div id="content-body">
            <div class="py-5 text-center w-100">
                <div class="mx-auto w-xxl w-auto-xs">
                    <div class="px-3">

                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div>
                                @if (session()->has('message'))
                                <div class="alert alert-danger">
                                    {{ session('message') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email" required  value="{{ old('email') }}">
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="password" required>
                            </div>

                            <div class="mb-3">
                                <label class="md-check">
                                    <input type="checkbox" name="remember">
                                    <i class="primary"></i> Keep me signed in
                                </label>
                            </div>

                            <button type="submit" class="btn primary">Sign in</button>
                        </form>

                        <div class="my-4">
                            <details>
                                <summary>Forgot Password?</summary>
                                <p> Contact admin for retrieval </p>
                            </details>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Switcher -->
    @include('includes.theme')

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('assets/plugins/popper.js/popper.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Plugins -->
    <script src="{{ asset('assets/plugins/pace-progress/pace.min.js')}}"></script>
    {{-- <script src="{{ asset('assets/plugins/pjax/pjax.js')}}"></script> --}}
    <script src="{{ asset('assets/js/lazyload.config.js')}}"></script>
    <script src="{{ asset('assets/js/lazyload.js')}}"></script>
    <script src="{{ asset('assets/js/plugin.js')}}"></script>
    <script src="{{ asset('assets/js/nav.js')}}"></script>
    <script src="{{ asset('assets/js/scrollto.js')}}"></script>
    <script src="{{ asset('assets/js/toggleclass.js')}}"></script>
    <script src="{{ asset('assets/js/theme.js')}}"></script>
    <script src="{{ asset('assets/js/ajax.js')}}"></script>
    <script src="{{ asset('assets/js/app.js')}}"></script>


</body>

</html>
