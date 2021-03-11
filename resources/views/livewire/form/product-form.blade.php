<div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
    data-whatever="@mdo">Add Product</button>


    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Manage Product</h5>
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
                                    wire:submit.prevent="@if($edit) updateProduct({{ $editData->id }}) @else  addProduct  @endif ">
                                    <div class="form-group">
                                        <label for="inpuName4">Product Name</label>
                                        <input type="text" class="form-control" id="inpuName1"
                                            placeholder="Product Name" value="{{$edit ? $product_name : '' }}"
                                            wire:model.debounce.1000ms="product_name" required>
                                        @error('product_name') <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inpuName4">Product Price</label>
                                        <input type="number" class="form-control" id="inpuName2"
                                            placeholder="Product Price" value="{{$edit ? $product_price : '' }}"
                                            wire:model.debounce.1000ms="product_price" required>
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
                                            wire:model.lazy="product_stock">
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
