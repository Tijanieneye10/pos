<div>
    @section('title', 'View Sales')
    <div class="box col-md-8 offset-md-2">
        <div class="box-body">
            @if($salesResult->count() > 1)
            <div class="col-md-8 offset-md-2 bg-grey">
                <div class="d-flex justify-content-between mb-3">
                    <div class="">
                        <h5 style="margin-bottom: 0px"><strong>Invoice No:</strong></h5>
                        <strong>{{ $invoice }}</strong>
                    </div>
                    <div class="">
                        <h5 style="margin-bottom: 0px"><strong>Date:</strong></h5>
                        <strong>{{ $time[0]->toFormattedDateString()}}</strong><br>
                        <strong>{{ $time[0]->toTimeString()}}</strong>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Product</th>
                                <th>Unit Price</th>
                                <th>Qty</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($salesResult as $sales)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $sales->product_name }}</td>
                                <td>{{ $sales->product_price}}</td>
                                <td>{{ $sales->product_qty}}</td>
                                <td>&#8358;{{ $sales->sub_total}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div  class="float-right">
                        <h5>Total: <strong>&#8358;{{ $salesResult->sum('sub_total') }}</strong></h5>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
