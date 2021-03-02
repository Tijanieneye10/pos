<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Category;

class Categories extends Component
{
    public $catName, $editData, $edit = false;

    // Add category
    public function addCategory()
    {

        Category::create(['name' => $this->catName]);
        session()->flash('message', 'Added successfully');
        $this->emit('alert', ['type' => 'success', 'message' => 'Category added successfully 😀']);

        $this->resetFilters();
    }

    //Edit category
    public function editCategory($catId)
    {
        $this->edit = true;
        $this->editData =  Category::find($catId);
        $this->catName = $this->editData->name;
    }

    // Update category
    public function updateCategory($catId)
    {
        Category::where('id', $catId)->update(['name' => $this->catName]);
        session()->flash('message', 'Updated successfully');
        $this->emit('alert', ['type' => 'success', 'message' => 'Category updated successfully 😀']);

    }

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

    //To refresh the page
    public function resetFilters()
    {
        $this->reset(['catName', 'edit']);
    }
}
