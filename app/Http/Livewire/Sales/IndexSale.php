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
    public $from;
    public $to;
    public $perPage = 10;


    protected $queryString = [
        'search' => ['except' => ''],
        'perUser' => ['except' => ''],
        'perPage' => ['except' => 10]
    ];

    protected $rules = [
        'from' => 'required_with:to|date',
        'to' => 'required_with:from|date|after:from'
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    protected $listeners = ['render', 'revert', 'selectedUser', 'selectedFrom', 'selectedTo'];

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


    // public function filterDate()
    // {
    //     $this->validate();
    //     $this->emitSelf('render');
    // }


    public function selectedUser(User $user)
    {
        $this->perUser = $user->id;
    }



    public function selectedFrom($from)
    {
        $this->from = $this->strToDate($from);
        $this->validate();
    }


    public function selectedTo($to)
    {
        $this->to = $this->strToDate($to);
        $this->validate();
    }


    public function refresh()
    {
        $this->reset(['to', 'from', 'perUser']);
        $this->resetErrorBag();
        $this->resetValidation();
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


    public function strToDate($str)
    {
        $time = strtotime($str);
        return date('Y-m-d', $time);
    }
}
