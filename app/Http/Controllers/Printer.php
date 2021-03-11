<?php

namespace App\Http\Controllers;

use App\Exports\SalesExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Exports\ExpenseExport;

class Printer extends Controller
{
    //Display the receipt
    public function show()
    {
        return view('printer');
    }

    // Download Sales report
    public function salesRecordsDownload(Excel $excel, Request $request)
    {
      $date = "{$request->startDate}-{$request->endDate}";
        return $excel->download(new SalesExport($request->startDate, $request->endDate), "Report-{$date}{$request->format}", );
    }

    // Download Expenses report
    public function expensesRecordsDownload(Excel $excel, Request $request)
    {
      $date = "{$request->startDate}-{$request->endDate}";
        return $excel->download(new ExpenseExport($request->startDate, $request->endDate), "Report-{$date}{$request->format}", );
    }
}
