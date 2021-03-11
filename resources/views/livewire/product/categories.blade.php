<div>
    @section('title', 'Categories')
    <div class="box">
        <div class="box-header">
            <h2>Category</h2>
            <small>Manage Category</small>
            @livewire('form.categories-form')
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
                                    wire:click.prevent="$emit('editCategory', {{ $category->id }})" data-toggle="modal"
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
