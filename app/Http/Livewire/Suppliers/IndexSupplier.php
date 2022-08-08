<?php

namespace App\Http\Livewire\Suppliers;

use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;

class IndexSupplier extends Component
{

    use WithPagination;
    
    protected $listeners = ['render', 'closeModal'];

    public $search = "";

    public function render()
    {
        return view('livewire.suppliers.index-supplier', [
            'suppliers' => Supplier::search($this->search)
                ->latest()
                ->paginate(10)
        ]);
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }
}
