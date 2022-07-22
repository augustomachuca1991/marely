<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;

class IndexProduct extends Component
{
    public $search = "";
    
    public function render()
    {
        return view('livewire.products.index-product',[
            'products' => ['producto 1' , 'producto 2', 'producto 3' , 'producto 4']
        ]);
    }
}
