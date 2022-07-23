<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class IndexProduct extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search = "";


    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10]
    ];

    public function render()
    {
        return view('livewire.products.index-product',[
            'products' => Product::searchProduct($this->search)->latest()->paginate($this->perPage)
        ]);
    }
}
