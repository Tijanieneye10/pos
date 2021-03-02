<div>
    @section('title', 'Sales Records')
    <div class="box">
        <div class="box-header">
            <h2>Sales Records</h2>
            <small>View sales records</small>
        </div>
        <div class="box-body">
            <div class="form-group row">
                <div class="col-lg-3">
                    <input type="search" class="form-control input-sm" placeholder="Search with Invoice number"
                        wire:model.debounce.500ms="searchTerm">
                </div>
            </div>
            <div class="table-responsive">
                <table class="table v-middle p-0 m-0 box table-bordered" data-plugin="dataTable">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Sales Time</th>
                            <th>Sold By</th>
                            <th>Transaction Ref</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($getSales as $sales)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sales->created_at }}</td>
                            <td>{{ $sales->user->fullname }}</td>
                            <td>{{ $sales->trans_code}}</td>
                            <td>{{ $sales->total}}</td>

                            <td>
                                <a href="{{ route('viewSales', $sales->trans_code) }}"><i
                                        class="fa fa-eye text-primary d-inline" style="cursor: pointer"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-2">
                    {{ $getSales->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
