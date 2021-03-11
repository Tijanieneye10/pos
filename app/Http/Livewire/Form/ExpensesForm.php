<?php

namespace App\Http\Livewire\Form;

use App\Models\Expense;
use Livewire\Component;
use Illuminate\Http\Request;

class ExpensesForm extends Component
{
    public $title, $description, $date, $amount, $edit = false, $editData;

    protected $listeners = ['editExpense' => 'editExpense'];

    // Validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'title' => 'required|min:3',
            'description' => 'required',
            'date' => 'required',
            'amount' => 'required',
        ]);
    }

    public function addExpense(Request $request)
    {

        $request->user()->expenses()->create([
            'title' => $this->title,
            'description' => $this->description,
            'date' => $this->date,
            'amount' => $this->amount,
        ]);
        $this->resetFilters();
        $this->dispatchBrowserEvent('alert',  ['type' => 'success', 'message' => 'Expense added successfully😊']);
        $this->emit('refreshPage');
    }

    // Edit expenses
    public function editExpense($expenseId)
    {
        $this->edit = true;
        $this->editData = Expense::find($expenseId);

        $this->title = $this->editData->title;
        $this->date = $this->editData->date;
        $this->amount = $this->editData->amount;
        $this->description = $this->editData->description;
    }

    public function updateExpense(Request $request, $expenseId)
    {
        $request->user()->expenses()->where('id', $expenseId)
            ->update([
                'title' => $this->title,
                'description' => $this->description,
                'amount' => $this->amount,
                'date' => $this->date,
            ]);
        $this->dispatchBrowserEvent('alert',  ['type' => 'success', 'message' => 'Record updated 😊']);
        $this->emit('refreshPage');
    }


    // Reset fields after submission
    public function resetFilters()
    {
        $this->reset(['edit', 'editData', 'title', 'amount', 'description', 'date']);
    }

    public function render()
    {
        return view('livewire.form.expenses-form');
    }
}
