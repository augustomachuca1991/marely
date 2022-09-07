<?php

namespace App\Http\Livewire\Components;

use App\Models\Product;
use Livewire\Component;

class SearchProduct extends Component
{
    public $suggestionProduct = false;
    public $search;
    public $take = 8;


    public function render()
    {
        return view('livewire.components.search-product', [
            'products' => $this->getProducts()
        ]);
    }


    public function getProducts()
    {
        return Product::searchProduct($this->search)->take($this->take)->get();
    }



    public function addProduct(Product $product)
    {
        $this->reset(['search', 'suggestionProduct']);
        $this->emitUp('loadProduct', $product);
    }
}
