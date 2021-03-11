<?php

namespace App\Http\Livewire;

use App\Models\Expense;
use Carbon\Carbon;
use App\Models\Shoppingcart;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $allRecords = Shoppingcart::get(['created_at', 'sub_total']);
        $today = Shoppingcart::whereDate('created_at', '=', Carbon::now())->get(['created_at', 'sub_total']);
        $yesterday = $allRecords->where('created_at', '>=', Carbon::yesterday());
        $week = $allRecords->where('created_at', '>=', Carbon::now()->subdays(7));
        $month = $allRecords->where('created_at', '>=', Carbon::now()->subdays(30));

        // Sales Record
        $recentSales = Shoppingcart::latest()->with(['user' => fn ($query) => $query->select('firstname', 'lastname', 'id')])
            ->get(['product_name', 'trans_code', 'product_qty', 'product_price', 'created_at', 'sub_total', 'user_id'])
            ->take(5);

        // $recentExpenses = Expense::latest()->with(['user' => fn ($query) => $query->select('firstname', 'lastname', 'id')])
        //     ->get(['title', 'description', 'amount',  'created_at', 'user_id'])
        //     ->take(5);

        return view('livewire.home', compact('today', 'week', 'month', 'yesterday', 'allRecords', 'recentSales'));
    }
}
