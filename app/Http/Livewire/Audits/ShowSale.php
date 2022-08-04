<?php

namespace App\Http\Livewire\Audits;

use App\Models\Sale;
use Livewire\Component;

class ShowSale extends Component
{

    public $search = "";
    public $perUser = "";
    public $from = "";
    public $to = "";
    public $perPage = 10;


    protected $listeners = ['render'];

    public function render()
    {
        $sales = Sale::searchSale($this->search)
        ->searchUser($this->perUser)
        ->fromTo($this->from, $this->to)
        ->paginate($this->perPage);
        return view('livewire.audits.show-sale', [
            'sales' => $sales
        ]);
    }


    public function filterDate()
    {
        $this->validate([
            'from' => 'required|date|required_with:to|lte:to',
            'to' => 'required|date|required_with:from|gte:from'
        ]);
        dd('ok');
        // $this->emitSelf('render');

    }
}
