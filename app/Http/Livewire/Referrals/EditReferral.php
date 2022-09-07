<?php

namespace App\Http\Livewire\Referrals;

use App\Models\Product;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class EditReferral extends Component
{
    use LivewireAlert;


    public $isOpenEdit = false;
    public $referral;
    public $product;
    public $products = [];
    public $pivot = [];


    protected $rules = [
        // 'products.*.code' => 'required',
        // 'products.*.name' => 'required',
        // 'products.*.description' => 'required',
        // 'products.*.stock' => 'required',
        // 'products.*.list_price' => 'required',
        // 'products.*.sale_price' => 'required',
        // 'products.*.profile_photo_path' => 'required',
        'products.*.pivot.quantity' => 'required',
        'products.*.pivot.unit_price' => 'required'

    ];


    protected $listeners = ['loadProduct'];



    public function mount($referral)
    {
        $this->referral = $referral;
        $this->products = $referral->products()->get()->toArray();
        $this->isOpenEdit = true;
    }


    public function render()
    {
        return view('livewire.referrals.edit-referral');
    }


    public function update()
    {
        //this->products;
        $this->validate();
        $count = [];
        foreach ($this->products as $key => $value) {

            $product = $this->referral->products()->where('products.id' , $value['id'] );
            if ($product->exists()) {
                $newStock = ($value['pivot']['quantity'] - $product->get()->first()->pivot->quantity);
                $product->get()->first()->stock += $newStock;
            }else{
                $productStock = Product::findOrFail($value['id']);
                $productStock->stock += $value['pivot']['quantity'];
            }
            $data[$value['id']] = [
                        'quantity' => $value['pivot']['quantity'],
                        'unit_price' => $value['pivot']['unit_price']
            ];
        }
        $this->referral->products()->sync($data);
        $this->emitTo('referrals.show-referral' , 'resetData');
        $this->alert('success' , 'La orden de compra se actualizo de forma correcta');
        $this->resetData();
    }


    public function resetData()
    {
        $this->reset(['isOpenEdit']);
        $this->emitTo('referrals.index-referral' , 'closeModal');
    }


    public function removeItem($i)
    {
        unset($this->products[$i]);
    }


    public function loadProduct(Product $product)
    {

        $this->product = Product::findOrFail($product->id);
        $this->product['pivot'] = ['referral_id' => $this->referral->id, 'product_id' => $product->id, 'quantity' => 0, 'unit_price' => $product->list_price];
        array_push($this->products, $this->product->toArray());
        //dd($this->products);

    }
}
