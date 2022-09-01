<?php

namespace App\Http\Livewire\Suppliers;

use App\Models\Supplier;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class IndexSupplier extends Component
{

    use WithPagination, LivewireAlert;

    protected $listeners = ['render', 'closeModal' , 'delete'];

    public $search = "";
    public $perPage = 10;


    public $isOpenEdit = false;


    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10]
    ];

    public function render()
    {
        return view('livewire.suppliers.index-supplier', [
            'suppliers' => $this->getSuppliers()
        ]);
    }


    public function getSuppliers()
    {
        return Supplier::search($this->search)
            ->latest()
            ->paginate($this->perPage);
    }



    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function edit(Supplier $supplier)
    {
        $this->supplier = $supplier;
        $this->isOpenEdit = true;
    }


    public function closeModal()
    {
        $this->reset('isOpenEdit');
    }


    public function confirmDelete(Supplier $supplier)
    {
        $this->supplier = $supplier;
        $this->confirm('Desea dar de baja este Proveedor?', [
            'onConfirmed' => 'delete',
        ]);
    }


    public function delete()
    {
        $name = $this->supplier->name;
        if ($this->supplier->referrals()->exists()) {
            $msj = "El proveedor" . $name . " tiene ordenes de compra asociados esto puede ocasionar problemas en el sistema";
            $condition = 'error';
        } else {
            $this->supplier->delete();
            $msj = "El proveedor" . $name . " ha sido eliminada";
            $condition = 'success';
        }
        $this->alert($condition, $msj);
    }


}
