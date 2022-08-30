<?php

namespace App\Http\Livewire\Reports;

use App\Models\Sale;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class IndexReport extends Component
{
    use LivewireAlert;


    public $search = "";
    public $perUser = "";
    public $from = "";
    public $to = "";
    public $perPage = 10;
    public $user;
    public $selectUser = false;


    protected $listeners = ['render', 'revert'];

    public function render()
    {
        $sales = Sale::searchSale($this->search)
        ->searchUser($this->perUser)
        ->fromTo($this->from, $this->to)
        ->latest()
        ->withTrashed()
        ->paginate($this->perPage);
        return view('livewire.reports.index-report', [
            'sales' => $sales
        ]);
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

        //dd($this->sale->products);
    }

    public function revert()
    {
        foreach ($this->sale->products as $key => $product) {
            $product->stock += $product->pivot->quantity;
            $product->updated_at = now();
            $product->save();
            //$product->sales()->detach($this->sale->id);
        }
        $this->sale->delete();
        $this->alert('success', 'Se revirtio la venta');
    }

}
