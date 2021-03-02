<div>
    @section('title', 'Expenses')
    <div class="box">
        <div class="box-header">
            <h2>Expenses</h2>
            <small>Manage Expenses</small>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                data-whatever="@mdo">Add Expenses</button>
        </div>
        <div class="box-body">
            <div class="form-group row">
                <div class="col-lg-3">
                    <input type="search" class="form-control input-sm" placeholder="Search with Invoice number"
                        wire:model.debounce.500ms="searchTerm">
                </div>
            </div>
            <div class="table-responsive">
                <table class="table v-middle p-0 m-0 box">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Title</th>
                            <th>Staff</th>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($expenses as $expense)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $expense->title }}</td>
                            <td>{{ $expense->user->firstname}} {{ $expense->user->lastname }}</td>
                            <td>{{ $expense->description}}</td>
                            <td>&#8358;{{ $expense->amount}}</td>
                            @can('isAdmin')
                            <td>
                                <i class="fa fa-times text-danger d-inline" style="cursor: pointer"
                                    onclick="confirm('Do you want to delete staff')"
                                    wire:click.prevent="destroyExpense({{ $expense->id }})"
                                    wire:loading.attr="disabled"></i>
                                <i class="fa fa-edit text-primary d-inline" style="cursor: pointer"
                                    wire:click.prevent="editExpense({{ $expense->id }})" data-toggle="modal"
                                    data-target="#exampleModal" data-whatever="@mdo"></i>
                            </td>
                            @endcan
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-2">
                    {{ $expenses->links() }}
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Manage Expense</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        wire:click="resetFilters">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="box">
                        <div class="box-header">
                            <small>Expenses</small>
                            <div class="box-body">

                                <form
                                    wire:submit.prevent="@if($edit) updateExpense({{ $editData->id }}) @else  addExpense  @endif ">
                                    <div class="form-group">
                                        <label for="inpuName4">Title</label>
                                        <input type="text" class="form-control" id="inpuName1" placeholder="Title"
                                            value="{{$edit ? $title : '' }}" wire:model.debounce.500ms="title" required>
                                        @error('title') <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group form-row">
                                        <label for="inpuName4">Amount</label>
                                        <input type="number" class="form-control" id="inpuName2" placeholder="Amount"
                                            value="{{$edit ? $amount : '' }}" wire:model..debounce.500ms="amount"
                                            required>
                                        @error('amount') <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inpuName4">Date</label>
                                        <input type="date" name="" id="" class="form-control"
                                            wire:model.debounce.500ms="date" value="{{$edit ? $date : '' }}>
                                        @error('date') <span class=" text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inpuName4">Description</label>
                                        <textarea name="" id="" cols="30" rows="5" class="form-control"
                                            wire:model="description">{{ $edit ? $description : ''  }}</textarea>
                                        @error('description') <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div wire:loading.loading.delay.remove wire:target="addExpenses()">
                                        <div class="form-group">
                                            <button type="submit"
                                                class="btn primary">{{$edit ? 'Update Record' : 'Add Expenses'}}</button>
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
