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
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css" />
    <script src="{{ asset('js/app.js') }}"></script>
    @livewireStyles
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
                @yield('content')
            </div>

            <!-- Footer -->
            @include('includes.footer')
        </div>
        @include('includes.theme')
    </div>
    <!-- jQuery -->
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false"></script>
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('assets/plugins/popper.js/popper.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Plugins -->
    <script src="{{ asset('assets/plugins/pace-progress/pace.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/pjax/pjax.js')}}"></script>
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





<div class="row">
    <div class="col-md-8">
        <div class="box">
            <div class="box-header">
                <h3 class="border-bottom">Point of Salesss</h3>
                <div class="box-body">
                        @foreach ($categories as $category)
                                <button class="btn #EFEFEF b-t-primary" wire:click="">{{ $category->name }}</button>
                        @endforeach
                </div>
            </div>
        </div>
        {{-- Products start here --}}

        <div class="row">
            @forelse ($products as $product)
            <div class="col-md-3" >
                <div class="box text-center">
                    <div class="box-tool">
                        <ul class="nav nav-xs">
                            <li class="nav-item dropdown">
                                <a class="nav-link text-muted" data-toggle="dropdown">
                                    <i class="fa fa-bars"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-scale pull-right dark">
                                    <a class="dropdown-item" href="#">Category: {{ $product->category_name }}</a>
                                    <a class="dropdown-item" href="#">Code: {{ $product->product_code }}</a>
                                    <a class="dropdown-item" href="#">Stock: {{ $product->product_stock}}</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item">Price: {{ $product->product_price }}</a>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="p-4">
                        <div class="d-flex justify-content-center " >
                           <h3 class="circle w-56 bg-danger text-white pt-2" style="font-family: Georgia, 'Times New Roman', Times, serif">{{$product->shortname}}</h3>
                        </div>
                        <a href="#" class="text-md d-block"><strong>{{ $product->product_name }}</strong></a>
                        <p><small><strong>&#8358;{{ $product->product_price }}</strong></small></p>
                        <a href="#" class="btn btn-sm btn-primary btn-rounded b-accent">Add to Cart</a> </div>
                </div>
            </div>
        </div>
        @empty
            <p>No Product found</p>
        @endforelse


        {{-- Product ends here --}}
        {{-- md ends here --}}
    </div>
    <div class="col-md-4">
        <div class="box">
            <div class="box-header">
                <h3>Cart</h3>
                <div class="box-body">
                    <table class=" table v-middle p-0 m-0 box"">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td>Amphos</td>
                                <td>3000</td>
                                <td>
                                    <span class="badge badge-primary"><i class="fa fa-plus d-inline" style="cursor: pointer"></i></span>  1
                                    <span class="badge badge-danger"><i class="fa fa-minus d-inline" style="cursor: pointer"></i></span>
                                </td>
                                <td><i class="fa fa-times text-danger d-inline" style="cursor: pointer"></i></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>Total</td>
                                <td class="text-right">	&#8358;255,90</td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-primary btn-block mt-3">Save and Print</button>
                    {{-- end of box-body --}}
                </div>
            </div>
        </div>
    </div> --}}
