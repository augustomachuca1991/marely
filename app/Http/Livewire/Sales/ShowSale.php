<?php

namespace App\Http\Livewire\Sales;

use Livewire\Component;

class ShowSale extends Component
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
        return view('livewire.sales.show-sale');
    }


    public function resetData(){
        $this->reset('isOpenShow');
        $this->emitTo('sales.index-sale','closeModal');
    }
}
