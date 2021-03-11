<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Product;


class Products extends Component
{
    protected $listeners = ['refreshPage' => '$refresh'];

    public function destroyProduct($productId)
    {
        $product = Product::find($productId);
        $product->delete();
        $this->dispatchBrowserEvent('alert',  ['type' => 'error', 'message' => 'Product deleted 😊']);
    }


    public function render()
    {
        $products = Product::all();
        return view('livewire.product.products', compact('products'));
    }
}
