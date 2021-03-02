<?php

namespace App\Http\Livewire\Sales;

use Livewire\Component;
use App\Models\Shoppingcart;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class GetSales extends Component
{
    use WithPagination;

    public $searchTerm;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $getSales = Shoppingcart::when($this->searchTerm, function ($query, $searchTerm) {
            return $query->latest()->with(['user' => function ($query) {
                $query->select('id', 'firstname', 'lastname');
            }])->where('trans_code', 'LIKE', "%{$searchTerm}%");
        }, function ($query) {
            return $query->latest()->with(['user' => function ($query) {
                $query->select('id', 'firstname', 'lastname');
            }]);
        })->select('trans_code', 'created_at', 'user_id',  DB::raw("SUM(sub_total) as total"))
            ->groupBy('trans_code')
            ->paginate(10);
            
        return view('livewire.sales.get-sales', compact('getSales'));
    }
}
