<?php

namespace App\Http\Livewire\Components;

use App\Models\Supplier;
use Livewire\Component;

class SearchSupplier extends Component
{
    public $suggestionSupplier = false;
    public $search;
    public $take = 8;


    public function render()
    {
        return view('livewire.components.search-supplier', [
            'suppliers' => $this->getSuppliers()
        ]);
    }


    public function getSuppliers()
    {
        return Supplier::search($this->search)->take($this->take)->get();
    }


    public function addSupplier(Supplier $supplier)
    {
        //dd($supplier);
        $this->reset(['search', 'suggestionSupplier']);
        $this->emitUp('loadSupplier', $supplier);
    }
}
