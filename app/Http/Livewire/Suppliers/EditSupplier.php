<?php

namespace App\Http\Livewire\Suppliers;

use App\Models\Supplier;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class EditSupplier extends Component
{

    use LivewireAlert;


    public $supplier;


    function rules()
    {
        return [
            'supplier.company_name' => 'required|max:50|unique:suppliers,company_name,' . $this->supplier->id,
            'supplier.location' => 'string|max:100',
            'supplier.phone_number' => 'numeric|digits:10|nullable'
        ];
    }


    public function mount($supplier)
    {
        $this->supplier = $supplier;
        //$this->isOpenEdit = true;
    }



    public function render()
    {
        return view('livewire.suppliers.edit-supplier');
    }


    public function update(Supplier $supplier)
    {
        $this->validate();
        $this->supplier->save();
        $this->alert('success' , 'El proveedor ha sido actualizado');
        $this->close();
    }

    public function close()
    {
        $this->emitTo('suppliers.index-supplier' ,  'closeModal');
    }
}
