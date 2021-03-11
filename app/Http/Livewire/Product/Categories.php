<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Category;

class Categories extends Component
{

    protected $listeners = ['refreshPage' => '$refresh'];
    // Destory category
    public function destroyCategory($catId)
    {
        $category = Category::find($catId);
        $category->delete();
        $this->emit('alert', ['type' => 'error', 'message' => 'Category deleted 😱']);
    }

    public function render()
    {
        return view('livewire.product.categories', ['categories' => Category::all()]);
    }
}
