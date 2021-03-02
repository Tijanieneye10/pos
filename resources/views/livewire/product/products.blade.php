<div>
    @section('title', 'Products')
    <div class="box">
        <div class="box-header">
            <h2>Products</h2>
            <small>Manage Product</small>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                data-whatever="@mdo">Add Product</button>
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
                                    wire:click.prevent="editProduct({{ $product->id }})" data-toggle="modal"
                                    data-target="#exampleModal" data-whatever="@mdo"></i>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Manage Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        wire:click="resetFilters">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="box">
                        <div class="box-header">
                            <small>Products</small>
                            <div class="box-body">

                                <form
                                    wire:submit.prevent="@if($edit) updateProduct({{ $editData->id }}) @else  addProduct  @endif    ">
                                    <div class="form-group">
                                        <label for="inpuName4">Product Name</label>
                                        <input type="text" class="form-control" id="inpuName1"
                                            placeholder="Product Name" value="{{$edit ? $product_name : '' }}"
                                            wire:model.debounce.500ms="product_name" required>
                                        @error('product_name') <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inpuName4">Product Price</label>
                                        <input type="number" class="form-control" id="inpuName2"
                                            placeholder="Product Price" value="{{$edit ? $product_price : '' }}"
                                            wire:model.debounce.500ms="product_price" required>
                                        @error('product_price') <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inpuName4">Product Category</label>
                                        <select wire:model="product_category" class="form-control" required>
                                            <option> Choose Category </option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('product_category') <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inpuName4">Product Stock</label>
                                        <input type="number" class="form-control" id="inpuName3"
                                            placeholder="Product Stock" value="{{$edit ? $product_stock : '' }}"
                                            wire:model.debounce.500ms="product_stock">
                                        @error('product_stock') <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div wire:loading.loading.delay.remove wire:target="addProduct()">
                                        <div class="form-group">
                                            <button type="submit"
                                                class="btn primary">{{$edit ? 'Update Record' : 'Add Product'}}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"
                            wire:click="resetFilters">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
