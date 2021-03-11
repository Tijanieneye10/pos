<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;
use App\Models\Category;

class CategoriesForm extends Component
{
    public $catName, $editData, $edit = false;

    protected $listeners = ['editCategory' => 'editCategory'];
    // Add category
    public function addCategory()
    {

        Category::create(['name' => $this->catName]);
        session()->flash('message', 'Added successfully');
        $this->dispatchBrowserEvent('alert',  ['type' => 'success', 'message' => 'Category added successfully😊']);
        $this->emit('refreshPage');
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
        $this->dispatchBrowserEvent('alert',  ['type' => 'success', 'message' => 'Category updated successfully😊']);
        $this->emit('refreshPage');
    }

    //To refresh the page
    public function resetFilters()
    {
        $this->reset(['catName', 'edit']);
    }

    public function render()
    {
        return view('livewire.form.categories-form');
    }
}
