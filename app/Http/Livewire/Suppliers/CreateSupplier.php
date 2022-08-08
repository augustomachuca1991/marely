<?php

namespace App\Http\Livewire\Suppliers;

use App\Models\Supplier;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use PhpParser\Node\Expr\New_;

class CreateSupplier extends Component
{

    use LivewireAlert;

    public $company_name;
    public $location;
    public $phone_number;
    public $showModal = false;


    protected $rules = [
        'company_name' => 'required|max:50',
        'location' => 'string|max:100',
        'phone_number' => 'numeric|digits:10|nullable'

    ];

    public function render()
    {
        return view('livewire.suppliers.create-supplier');
    }


    public function store()
    {
        $this->validate();
        $supplier = new Supplier();
        $supplier->company_name = $this->company_name;
        $supplier->phone_number = $this->phone_number;
        $supplier->location = $this->location;
        $supplier->save();
        $this->alert('success', 'Nuevo Proveedor');
        $this->emitTo('suppliers.index-supplier', 'render');
        $this->reset(['company_name', 'location', 'phone_number', 'showModal']);
    }
}
