<div>
    @section('title', 'Dashboard')
    <div class="row mb-2">
        <div class="col-md-2">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-dark">Today <span
                            class="badge badge-primary float-right">{{ $today->count() }}</span></h6>
                </div>
                <div class="card-body">
                    <h3 class="text-dark">&#8358;{{  $today->sum('sub_total') }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-dark">Yesterday<span
                            class="badge badge-primary float-right">{{ $yesterday->count() }}</span></h6>
                </div>
                <div class="card-body">
                    <h3 class="text-dark">&#8358;{{  $yesterday->sum('sub_total') }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-dark">Last 7 Days <span
                            class="badge badge-info float-right">{{ $week->count() }}</span></h6>
                </div>
                <div class="card-body">
                    <h3 class="text-dark">&#8358;{{  $week->sum('sub_total') }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-dark">A Month <span
                            class="badge badge-warning float-right">{{ $month->count() }}</span></h6>
                </div>
                <div class="card-body">
                    <h3 class="text-dark">&#8358;{{  $month->sum('sub_total') }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-dark">Total Sales <span
                            class="badge badge-primary float-right">{{ $allRecords->count() }}</span></h6>
                </div>
                <div class="card-body">
                    <h3 class="text-right text-dark">&#8358;{{  $allRecords->sum('sub_total') }}</h3>
                </div>
            </div>
        </div>
    </div>
    {{-- Row ends --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">RECENT SALES</h5>
                    <div class="table-responsive">
                        @if ($recentSales->count())
                        <table class="table v-middle p-0 m-0 box table-bordered" data-plugin="dataTable">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Product</th>
                                    <th>Sold By</th>
                                    <th>Transaction Ref</th>
                                    <th>Qty</th>
                                    <th>Date</th>
                                    <th>Sub-Total</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentSales as $sales)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sales->product_name}}</td>
                                    <td>{{ $sales->user->fullname }}</td>
                                    <td>{{ $sales->trans_code}}</td>
                                    <td><span class="badge badge-primary">{{ $sales->product_qty}}</span></td>
                                    <td><span class="badge badge-success">{{ $sales->created_at->diffForHumans()}}</span></td>
                                    <td> &#8358;{{ $sales->sub_total}}</td>
                                    <td> &#8358;{{ $sales->sub_total * $sales->product_qty }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Expenses</h5>
                    <div class="table-responsive">
                        @if ($recentExpenses)
                        <table class="table v-middle p-0 m-0 box">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Title</th>
                                    <th>Staff</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentExpenses as $expense)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $expense->title }}</td>
                                    <td>{{ $expense->user->fullname}}</td>
                                    <td>{{ Str::limit($expense->description, 20)}}</td>
                                    <td>&#8358;{{ $expense->amount}}</td>
                                    <td>{{ $expense->created_at->diffForHumans()}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>
