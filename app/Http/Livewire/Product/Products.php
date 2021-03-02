<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use EneyeGenerateString\Generate;

class Products extends Component
{
    public $product_name, $product_price, $product_stock,
        $product_category, $edit = false, $editData;

    // Let validate user
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'product_name' => 'required|min:3',
            'product_price' => 'required|numeric',
            'product_stock' => 'numeric',
            'product_category' => 'required',
        ]);
    }

    public function addProduct()
    {
        $code = new Generate();
        $code = $code->generateString(4, '1234567890');

        Product::create([
            'product_name' => $this->product_name,
            'product_price' => $this->product_price,
            'product_stock' => $this->product_stock,
            'category_name' => $this->product_category,
            'product_code' => $code,
        ]);

        $this->resetFilters();
        $this->emit('alert', ['type' => 'success', 'message' => 'Product added successfully 😀']);
    }

    public function editProduct($productId)
    {
        $this->edit = true;
        $this->editData = Product::find($productId);

        $this->product_name = $this->editData->product_name;
        $this->product_price = $this->editData->product_price;
        $this->product_stock = $this->editData->product_stock;
        $this->product_category = $this->editData->category_name;
    }

    public function updateProduct($productId)
    {
        Product::where('id', $productId)
            ->update([
                'product_name' => $this->product_name,
                'product_price' => $this->product_price,
                'product_stock' => $this->product_stock,
                'category_name' => $this->product_category,
            ]);
        $this->emit('alert', ['type' => 'success', 'message' => 'Record updated 😀']);
    }

    public function destroyProduct($productId)
    {
        $product = Product::find($productId);
        $product->delete();
        $this->emit('alert', ['type' => 'error', 'message' => 'Product deleted 😀']);

    }

    public function resetFilters()
    {
        $this->reset(['edit', 'editData', 'product_name', 'product_price', 'product_category', 'product_stock']);
    }


    public function render()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('livewire.product.products', compact('products', 'categories'));
    }
}
