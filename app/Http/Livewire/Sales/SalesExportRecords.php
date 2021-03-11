<?php

namespace App\Http\Livewire\Sales;

use Livewire\Component;
use App\Exports\SalesExport;
use Maatwebsite\Excel\Excel;

class SalesExportRecords extends Component
{
    public $startDate, $endDate, $docFormat;
    // Let validate request
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'startDate' => 'required',
            'endDate' => 'required',
            'docFormat' => 'required',
        ]);
    }

    public function render()
    {
        return view('livewire.sales.sales-export-records');
    }
}
