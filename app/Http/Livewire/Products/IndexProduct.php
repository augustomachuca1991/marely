<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class IndexProduct extends Component
{
    use WithPagination;

    public $perPage = 20;
    public $search = "";
    public $byCategory = "";
    public $byStatus = "";
    public $bySupplier= "";

    public $product;
    public $isOpenEdit = false;


    protected $queryString = [
        'search' => ['except' => ''],
        'byCategory' => ['except' => ''],
        'byStatus' => ['except' => ''],
        'bySupplier' => ['except' => ''],
        'perPage' => ['except' => 20]
    ];

    protected $listeners = ['render' , 'closeModal'];

    public function render()
    {
        return view('livewire.products.index-product',[
            'products' => Product::searchProduct($this->search)
            ->searchCategory($this->byCategory)
            ->searchStatus($this->byStatus)
            ->latest()->paginate($this->perPage)
        ]);
    }


    public function edit(Product $product)
    {
        $this->product = $product;
        $this->isOpenEdit = true;
    }

    public function delete(Product $product){
        $this->product = $product;
        $this->product->delete();
    }


    public function closeModal(){
        //$this->isOpenShow = false;
        $this->isOpenEdit = false;
    }

    public function loadMore()
    {
        $this->perPage += $this->perPage;
    }
}
