<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Shoppingcart;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $allRecords = Shoppingcart::get(['created_at', 'sub_total']);
        $today = $allRecords->where('created_at', '=', Carbon::today());
        $yesterday = $allRecords->where('created_at', '>=', Carbon::yesterday());
        $week = $allRecords->where('created_at', '>=', Carbon::now()->subdays(7));
        $month = $allRecords->where('created_at', '>=', Carbon::now()->subdays(30));

        return view('livewire.home', compact('today', 'week', 'month', 'yesterday', 'allRecords' ));
    }
}
