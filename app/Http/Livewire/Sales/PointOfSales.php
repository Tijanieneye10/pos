<?php

namespace App\Http\Livewire\Sales;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;

class PointOfSales extends Component
{


    public  $searchTerm;

    public function render()
    {
        $products = $this->searchCategory();
        $categories = Category::all();
        return view('livewire.sales.point-of-sales', compact('categories', 'products'));
    }

    // Get the categories
    public function searchCategory()
    {
        return Product::when(!empty($this->searchTerm) && $this->searchTerm !== "all", function ($query) {
            return $query->where('category_name', 'LIKE', $searchResult = "%{$this->searchTerm}%")
                ->orWhere('product_name', 'LIKE', $searchResult)
                ->orWhere('product_code', 'LIKE', $searchResult);
        })->get();
    }
}
