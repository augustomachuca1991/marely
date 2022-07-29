<?php

namespace App\Http\Livewire\Shops;

use Livewire\Component;

class IndexShop extends Component
{
    public $cart;
    public $quantities = [];
    public $isOpenShow = false;

    public function render()
    {
        return view('livewire.shops.index-shop');
    }


    public function show()
    {
        $this->cart = \Cart::session(auth()->id())->getContent();
        $this->isOpenShow = true;
        $this->quantities = \Cart::session(auth()->id())->getContent()->pluck('quantity', 'id')->all();
    }


    public function delete_to_cart($rowId)
    {
        dd($rowId);
        //\Cart::session(auth()->id())->remove(1);
        //$this->emitTo('categories.index-category', 'render');

    }

    public function update_quantity($itemId, $quantity)
    {
        dd($itemId, $quantity);
        // \Cart::session(auth()->id())->update(
        //     $itemId,
        //     array(
        //         'quantity' => array(
        //             'relative' => false,
        //             'value' => $quantity
        //         ),
        //     )
        // );
    }
}
