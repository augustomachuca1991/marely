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
    public $byCategory = "";


    protected $queryString = [
        'search' => ['except' => ''],
        'byCategory' => ['except' => ''],
        'perPage' => ['except' => 10]
    ];

    protected $listeners = ['render'];

    public function render()
    {
        return view('livewire.products.index-product',[
            'products' => Product::searchProduct($this->search)->searchCategory($this->byCategory)->latest()->paginate($this->perPage)
        ]);
    }
}
