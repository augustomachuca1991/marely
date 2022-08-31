<?php

namespace App\Http\Livewire\Shops;

use App\Models\Product;
use App\Models\Sale;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CartShop extends Component
{

    use LivewireAlert;

    public $cart;
    public $quantities = [];
    public $articles = [];
    public $isOpenShow = false;
    public $isOpenNext = false;
    public $sale;


    protected $listeners = ['render', 'confirmed'];

    protected $messages = [

        'quantities.*.required' => 'Este campo es obligatorio',
        'quantities.*.integer' => 'Este campo solo acepta numeros enteros',
        'quantities.*.min' => 'Este campo debe contener al menos 1 articulo',
        'quantities.*.lte' => 'El stock no disponible',

    ];

    public function render()
    {

        //$carts = Cart::session(auth()->id())->getContent();
        $carts = Cart::session(auth()->id());
        return view('livewire.shops.cart-shop', [
            'carts' => $carts
        ]);
    }


    public function updated($field)

    {

        $this->validateOnly($field, [
            'quantities.*' => 'required|integer|min:1|lte:articles.*.stock'
        ]);
    }

    public function show()
    {
        //$this->cart = Cart::session(auth()->id())->getContent();
        $this->isOpenShow = true;
        $this->quantities = Cart::session(auth()->id())->getContent()->pluck('quantity', 'id')->all();
        $this->articles = Cart::session(auth()->id())->getContent()->pluck('associatedModel', 'id')->all();
    }


    public function delete_to_cart($rowId, $index)
    {

        unset($this->articles[$index]);
        //array_splice($this->stockAvailable, $index, 1);
        Cart::session(auth()->id())->remove($rowId);
        if (!Cart::session(auth()->id())->getContent()->count()) {
            $this->reset('isOpenShow');
        }
    }

    public function update_quantity($item, $index)
    {
        $this->articles[$index] = $item['associatedModel'];
        Cart::session(auth()->id())->update(
            $item['id'],
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $this->quantities[$index]
                ),
            )
        );
    }

    public function confirmSale()
    {
        $this->validate([
            'quantities.*' => 'required|integer|min:1|lte:articles.*.stock'
        ]);
        $this->confirm('Desea comfirmar la compra?', [
            'onConfirmed' => 'confirmed',
        ]);
    }

    public function confirmed()
    {
        $this->sale = new Sale();
        $this->sale->user_id = auth()->id();
        $this->sale->amount = Cart::session(auth()->id())->getTotal();
        $this->sale->save();
        foreach (Cart::session(auth()->id())->getContent() as $key => $item) {
            $product = Product::findOrFail($item->associatedModel->id);
            $product->stock -= $item->quantity;
            $product->save();
            $this->sale->products()->attach($product->id, ['quantity' =>  $item->quantity, 'price_to_date' => $item->price]);
        }
        Cart::session(auth()->id())->clear();
        $this->alert('success', 'La compra se realizó con exito');
        $this->isOpenNext = true;
    }

    public function resetData()
    {
        $this->reset([
            'isOpenNext',
            'isOpenShow',
        ]);
        Cart::session(auth()->id())->clear();
    }
}
