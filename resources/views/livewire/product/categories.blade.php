<div>
    @section('title', 'Categories')
    <div class="box">
        <div class="box-header">
            <h2>Category</h2>
            <small>Manage Category</small>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                data-whatever="@mdo">Add Category</button>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table id="datatable" class="table v-middle p-0 m-0 box" data-plugin="dataTable">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Category</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->created_at->diffForHumans()}}</td>
                            <td>{{ $category->updated_at->diffForHumans()}}</td>
                            <td>
                                <i class="fa fa-times text-danger d-inline" style="cursor: pointer"
                                    onclick="confirm('Do you want to delete staff')"
                                    wire:click.prevent="destroyCategory({{ $category->id }})"
                                    wire:loading.attr="disabled"></i>
                                <i class="fa fa-edit text-primary d-inline" style="cursor: pointer"
                                    wire:click.prevent="editCategory({{ $category->id }})" data-toggle="modal"
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
                            <small>Category</small>
                            <div class="box-body">

                                <form
                                    wire:submit.prevent="@if($edit) updateCategory({{ $editData->id }}) @else  addCategory  @endif    ">

                                    <div class="form-group">
                                        <label for="inpuName4">Category Name</label>
                                        <input type="text" class="form-control" id="inpuName4"
                                            placeholder="Cateogry Name" value="{{$edit ? $catName : '' }}"
                                            wire:model="catName" required>
                                        @error('catName') <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn primary"
                                            wire:loading.attr="disabled">{{$edit ? 'Update Record' : 'Add Category'}}</button>
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
