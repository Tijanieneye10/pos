<?php

namespace App\Http\Livewire\Expense;

use App\Models\Expense;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Expenses extends Component
{
    use WithPagination, AuthorizesRequests;
    protected $paginationTheme = 'bootstrap';

    public $title, $description, $date, $amount, $edit = false, $editData, $searchTerm;

    public function mount()
    {
        $this->authorize('isAdmin');
    }
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
        $this->emit('alert', ['type' => 'success', 'message' => 'Expense added successfully 😀']);
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
        $this->emit('alert', ['type' => 'success', 'message' => 'Record updated 😀']);
    }


    // Reset fields after submission
    public function resetFilters()
    {
        $this->reset(['edit', 'editData', 'title', 'amount', 'description', 'date']);
    }

    // Delete expense
    public function destroyExpense($expenseId)
    {
        $product = Expense::find($expenseId);
        $product->delete();
        $this->emit('alert', ['type' => 'error', 'message' => 'Expense deleted 😀']);
    }

    public function render()
    {
        $expenses = Expense::when($this->searchTerm, function ($query, $searchTerm) {
            $query->with(['user' => function ($query) {
                $query->select('id', 'firstname', 'lastname');
            }])->where('title', 'LIKE', "%{$searchTerm}%")
                ->orWhere('description', 'LIKE', $searchTerm)
                ->orWhere('amount', 'LIKE', $searchTerm);
        }, function ($query) {
            $query->with(['user' => function ($query) {
                $query->select('id', 'firstname', 'lastname');
            }]);
        })->paginate(20);

        return view('livewire.expense.expenses', compact('expenses'));
    }
}
