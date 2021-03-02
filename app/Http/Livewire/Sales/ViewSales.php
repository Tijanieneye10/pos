<?php

namespace App\Http\Livewire\Sales;

use Livewire\Component;
use Illuminate\Support\Arr;
use App\Models\Shoppingcart;

class ViewSales extends Component
{
    public $invoice;

    public function mount($invoice)
    {
        $this->invoice = $invoice;

    }
    public function render()
    {
        $salesResult = Shoppingcart::where('trans_code', $this->invoice)->get();
        $time = Arr::pluck($salesResult, 'created_at');
        return view('livewire.sales.view-sales', compact('salesResult', 'time'));
    }
}
