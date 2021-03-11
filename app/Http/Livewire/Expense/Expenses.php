<?php

namespace App\Http\Livewire\Expense;

use App\Models\Expense;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Expenses extends Component
{
    use WithPagination, AuthorizesRequests;

    protected $paginationTheme = 'bootstrap';
    public $searchTerm;

    protected $listeners = ['refreshPage' => '$refresh'];

    public function mount()
    {
        $this->authorize('isAdmin');
    }

    // Delete expense
    public function destroyExpense($expenseId)
    {
        $product = Expense::find($expenseId);
        $product->delete();
        $this->emit('alert', ['type' => 'error', 'message' => 'Expense deleted 😀']);
        $this->dispatchBrowserEvent('alert',  ['type' => 'error', 'message' => 'Expense deleted😊']);
    }

    public function render()
    {
        $expenses = Expense::when($this->searchTerm, function ($query, $searchTerm) {
            $query->with(['user' => fn($query) => $query->select('id', 'firstname', 'lastname')
            ])->where('title', 'LIKE', "%{$searchTerm}%")
                ->orWhere('description', 'LIKE', $searchTerm)
                ->orWhere('amount', 'LIKE', $searchTerm);
        }, function ($query) {
            $query->with(['user' => fn ($query) => $query->select('id', 'firstname', 'lastname')]);
        })->paginate(20);

        return view('livewire.expense.expenses', compact('expenses'));
    }
}
