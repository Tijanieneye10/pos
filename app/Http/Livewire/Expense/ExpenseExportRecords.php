<?php

namespace App\Http\Livewire\Expense;

use Livewire\Component;

class ExpenseExportRecords extends Component
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
        return view('livewire.expense.expense-export-records');
    }
}
