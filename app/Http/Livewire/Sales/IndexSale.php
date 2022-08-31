<?php

namespace App\Http\Livewire\Sales;


use App\Models\Sale;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class IndexSale extends Component
{
    use LivewireAlert;
    use WithPagination;


    public $search = "";
    public $perUser = "";
    public $from = "";
    public $to = "";
    public $perPage = 10;
    public $user;
    public $selectUser = false;


    protected $queryString = [
        'search' => ['except' => ''],
        'perUser' => ['except' => ''],
        'from' => ['except' => ''],
        'to' => ['except' => ''],
        'perPage' => ['except' => 10]
    ];


    protected $listeners = ['render', 'revert'];

    public function render()
    {
        return view('livewire.sales.index-sale', [
            'sales' => $this->getSales()
        ]);
    }


    public function getSales()
    {
        return Sale::searchSale($this->search)
            ->searchUser($this->perUser)
            ->fromTo($this->from, $this->to)
            ->latest()
            ->withTrashed()
            ->paginate($this->perPage);
    }


    public function filterDate()
    {
        $this->validate([
            'from' => 'required|required_with:to|date',
            'to' => 'required|required_with:from|date|after:from'
        ]);
        $this->emitSelf('render');
    }


    public function selectedUser(User $user)
    {
        $this->user = $user;
        $this->perUser = $this->user->id;
        $this->selectUser = false;
    }


    public function confirmRevert(Sale $sale)
    {
        $this->sale = $sale;
        $this->confirm('Esta seguro de revertir la venta?', [
            'onConfirmed' => 'revert',
        ]);
    }

    public function revert()
    {
        foreach ($this->sale->products as $key => $product) {
            $product->stock += $product->pivot->quantity;
            $product->updated_at = now();
            $product->save();
        }
        $this->sale->delete();
        $this->alert('success', 'Se revirtio la venta');
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }
}
