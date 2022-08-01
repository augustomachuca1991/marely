<?php

namespace App\Http\Livewire\Shops;

use App\Models\Product;
use App\Models\Sale;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class IndexShop extends Component
{
    use LivewireAlert;
    
    public $cart;
    public $quantities = [];
    public $isOpenShow = false;
    public $isOpenNext = false;


    protected $listeners = ['render'];

    // function rules() {
    //     return [
    //         'stock' => 'lte:'.$this->product->id,
    //         'product.name' => 'required|max:50|unique:products,name,'.$this->product->id,
    //         'product.description' => 'required|max:255',
    //         'product.stock' => 'required|integer',
    //         'product.list_price' => 'required|numeric',
    //         'product.sale_price' => 'required|numeric',
    //         'product.category_id' => 'required',
    //         'photoEdit' => 'image|max:1024|nullable',
    //     ];
    // }

    public function render()
    {

        $carts = Cart::session(auth()->id())->getContent();
        return view('livewire.shops.index-shop' , [
            'carts' => $carts
        ]);
    }


    public function show()
    {
        //$this->cart = Cart::session(auth()->id())->getContent();
        $this->isOpenShow = true;
        $this->quantities = Cart::session(auth()->id())->getContent()->pluck('quantity', 'id')->all();
    }


    public function delete_to_cart($rowId)
    {
        Cart::session(auth()->id())->remove($rowId);
        if (!Cart::session(auth()->id())->getContent()->count()) {
            $this->reset('isOpenShow');
        }

    }

    public function update_quantity($itemId, $index)
    {
        // dd($itemId, $this->quantities[$index]);
        Cart::session(auth()->id())->update(
            $itemId,
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
        $sale = new Sale();
        $sale->user_id = auth()->id();
        $sale->amount = Cart::session(auth()->id())->getTotal();
        $sale->save();
        foreach (Cart::session(auth()->id())->getContent() as $key => $item) {
            $product = Product::findOrFail($item->associatedModel->id);
            if ($product->stock > $item->quantity ) {
                $product->stock -= $item->quantity;
                $product->save();
                $sale->products()->attach($product->id);
            }
        }
        $this->alert('success' , 'La compra se realizó con exito');
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
