<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class IndexProduct extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $perPage = 20;
    public $search = "";
    public $byCategory = "";
    public $byStatus = "";
    public $bySupplier = "";
    public $order = 'ASC';

    public $product;
    public $isOpenEdit = false;
    public $isOpenShow = false;


    protected $queryString = [
        'search' => ['except' => ''],
        'byCategory' => ['except' => ''],
        'byStatus' => ['except' => ''],
        'bySupplier' => ['except' => ''],
        'perPage' => ['except' => 20]
    ];

    protected $listeners = ['render', 'closeModal', 'delete'];

    public function render()
    {

        return view('livewire.products.index-product', [
            'products' => $this->getProducts()
        ]);
    }

    public function getProducts()
    {
        return Product::searchProduct($this->search)
            ->searchCategory($this->byCategory)
            ->searchStatus($this->byStatus)
            ->orderBy('name', $this->order)
            ->paginate($this->perPage);
    }

    public function show(Product $product)
    {
        $this->product = $product;
        $this->isOpenShow = true;
    }


    public function edit(Product $product)
    {
        $this->product = $product;
        $this->isOpenEdit = true;
    }

    public function confirmDelete(Product $product)
    {
        $this->product = $product;
        $this->confirm('Desea dar de baja este articulo?', [
            'onConfirmed' => 'delete',
        ]);

    }


    public function closeModal()
    {
        $this->isOpenShow = false;
        $this->isOpenEdit = false;
    }

    public function loadMore()
    {
        $this->perPage += $this->perPage;
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function orderName()
    {
        if ($this->order == 'ASC') {
            $this->order = 'DESC';
        }else{
            $this->reset('order');
        }
    }


    public function delete()
    {

        $this->product->delete();
        $this->alert('success', 'El Articulo se ha dado de baja');
    }
}
