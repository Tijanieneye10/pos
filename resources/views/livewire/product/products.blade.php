<div>
    @section('title', 'Products')
    <div class="box">
        <div class="box-header">
            <h2>Products</h2>
            <small>Manage Product</small>
            @livewire('form.product-form')
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table id="datatable" class="table v-middle p-0 m-0 box" data-plugin="dataTable">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Code</th>
                            <th>Stock</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->category_name }}</td>
                            <td>{{ $product->product_price}}</td>
                            <td>{{ $product->product_code}}</td>
                            <td>{{ $product->product_stock}}</td>
                            <td>
                                <i class="fa fa-times text-danger d-inline" style="cursor: pointer"
                                    onclick="confirm('Do you want to delete staff')"
                                    wire:click.prevent="destroyProduct({{ $product->id }})"
                                    wire:loading.attr="disabled"></i>
                                <i class="fa fa-edit text-primary d-inline" style="cursor: pointer"
                                    wire:click.prevent="$emit('editProduct', {{ $product->id }} )" data-toggle="modal"
                                    data-target="#exampleModal" data-whatever="@mdo"></i>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
