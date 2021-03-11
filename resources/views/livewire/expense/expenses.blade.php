<div>
    @section('title', 'Expenses')
    <div class="box">
        <div class="box-header">
            <h2>Expenses</h2>
            <small>Manage Expenses</small>
            @livewire('form.expenses-form')
        </div>
        <div class="box-body">
            <div class="form-group row">
                <div class="col-lg-3">
                    <input type="search" class="form-control input-sm" placeholder="Search with Invoice number"
                        wire:model.debounce.800ms="searchTerm">
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
                                    wire:click.prevent="$emit('editExpense', {{ $expense->id }})" data-toggle="modal"
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

</div>
