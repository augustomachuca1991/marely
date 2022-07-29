<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;

class ShowProduct extends Component
{

    public $product;
    public $isOpenShow = false;

    public function mount($product)
    {
        $this->product = $product;
        $this->isOpenShow = true;
    }

    public function render()
    {
        return view('livewire.products.show-product');
    }

    public function resetData()
    {
        $this->reset('isOpenShow');
        $this->emitTo('products.index-product','closeModal');
    }
}
