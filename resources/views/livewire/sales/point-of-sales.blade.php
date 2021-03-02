<div>
    @section('title', 'Point of Sales')
    <div class="row">
        <div class="col-md-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="border-bottom">Point of Sales</h3>
                    <div class="box-body">
                        <div class="form-group row">
                            <div class="col-lg-8">
                                <input type="search" class="form-control input-sm"
                                    placeholder="Search with Product name or code"
                                    wire:model.debounce.500ms="searchTerm">
                            </div>
                        </div>
                        <button class="btn #EFEFEF b-t-primary" wire:click="$set('searchTerm', 'all')">All</button>
                        @foreach ($categories as $category)
                        <button class="btn #EFEFEF b-t-primary"
                            wire:click="$set('searchTerm', '{{ $category->name }}')">{{ $category->name }}</button>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- Products start here --}}
            <div class="row" style="overflow:scroll; height:400px;">
                @forelse ($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-12">
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
                            <div class="d-flex justify-content-center ">
                                <h3 class="circle w-56 bg-danger text-white pt-2"
                                    style="font-family: Georgia, 'Times New Roman', Times, serif">
                                    {{$product->shortname}}</h3>
                            </div>
                            <a href="#" class="text-md d-block"><strong>{{ $product->product_name }}</strong></a>
                            <p><small><strong>&#8358;{{ $product->product_price }}</strong></small></p>
                            <a href="#" class="btn btn-sm btn-primary btn-rounded b-accent"
                                wire:click.prevent="$emit('storeData', {{ $product->id }}, '{{ $product->product_name }}', {{ $product->product_price }})">Add
                                to Cart</a>
                        </div>
                    </div>

                </div>
                @empty
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                        <strong>No Product found</strong>
                    </div>
                </div>
                @endforelse

            </div>
        </div>
        {{-- cart --}}
        <div class="col-md-4">
            <div class="box ">
                <div class="box-header">
                    <h3 class="border-bottom">Cart</h3>
                    <div class="box-body">
                        <livewire:sales.shopping-cart />
                        {{-- end of box-body --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Row ends --}}

</div>
