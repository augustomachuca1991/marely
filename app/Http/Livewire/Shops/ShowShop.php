<?php

namespace App\Http\Livewire\Shops;

use Livewire\Component;

class ShowShop extends Component
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
        return view('livewire.shops.show-shop');
    }


    public function resetData()
    {
        $this->reset('isOpenShow');
        $this->emitTo('shops.index-shop', 'closeModal');
    }
}
