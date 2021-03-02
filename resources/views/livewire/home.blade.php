<div>
    @section('title', 'Dashboard')
    <div class="row">
        <div class="col-md-2">
            <div class="box">
                <div class="box-header">
                    <h6>Today <span class="badge badge-primary float-right">{{ $today->count() }}</span></h6>
                    <hr>
                    <div class="box-body">
                       <h3>&#8358;{{  $today->sum('sub_total') }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="box">
                <div class="box-header">
                    <h6> Yesterday<span class="badge badge-primary float-right">{{ $yesterday->count() }}</span></h6>
                    <hr>
                    <div class="box-body">
                        <h3>&#8358;{{  $yesterday->sum('sub_total') }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="box">
                <div class="box-header">
                    <h6>Last 7 Days <span class="badge badge-info float-right">{{ $week->count() }}</span></h6>
                    <hr>
                    <div class="box-body">
                        <h3>&#8358;{{  $week->sum('sub_total') }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="box">
                <div class="box-header">
                    <h6>Last 30 Days <span class="badge badge-warning float-right">{{ $month->count() }}</span></h6>
                    <hr>
                    <div class="box-body">
                        <h3>&#8358;{{  $month->sum('sub_total') }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box">
                <div class="box-header">
                    <h6>Total Sales <span class="badge badge-primary float-right">{{ $allRecords->count() }}</span></h6>
                    <hr>
                    <div class="box-body">
                        <h3 class="text-right">&#8358;{{  $allRecords->sum('sub_total') }}</h3>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- Row ends --}}

</div>
