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
        'referral.bonification' => 'required|numeric',
        'products.*.pivot.quantity' => 'required|integer|min:1',
        'products.*.pivot.unit_price' => 'required',
        //'products.*.id' => 'distinct'
    ];

    protected $messages = [

        'products.*.id.distinct' => 'Este item esta repetido. Verifique',
        'products.*.pivot.quantity.required' => 'Este campo es obligatorio',
        'products.*.pivot.quantity.integer' => 'Este campo solo adminte numero enteros',
        'products.*.pivot.quantity.min' => 'Debe cargar al menos un articulo',


    ];


    protected $listeners = ['loadProduct'];



    public function mount($referral)
    {
        $this->referral = $referral;
        $this->products = $referral->products()->get()->toArray();
        $this->isOpenEdit = true;
    }

    public function updated($field)
    {

        $this->validateOnly($field, [
            'products.*.id' => 'distinct'
        ]);
    }


    public function render()
    {
        return view('livewire.referrals.edit-referral');
    }


    public function update()
    {
        $this->validate();
        $data = $this->updatingItem();
        $this->referral->products()->sync($data);
        $this->referral->save();
        $this->emitTo('referrals.show-referral', 'resetData');
        $this->alert('success', 'La orden de compra se actualizo de forma correcta');
        $this->resetData();
    }


    public function resetData()
    {
        $this->reset(['isOpenEdit']);
        $this->emitTo('referrals.index-referral', 'closeModal');
    }


    public function removeItem($i)
    {

        $product = $this->referral->products()->where('products.id', $this->products[$i]['id']);
        if ($product->exists()) {
            $product1 = $product->first();
            $product1->stock -= $product1->pivot->quantity;
            $product1->save();
        }
        unset($this->products[$i]);
    }


    public function loadProduct(Product $product)
    {
        $this->product = Product::findOrFail($product->id);
        $this->product['pivot'] = ['referral_id' => $this->referral->id, 'product_id' => $product->id, 'quantity' => 0, 'unit_price' => $product->list_price];
        array_push($this->products, $this->product->toArray());
        $this->validate([
            'products.*.id' => 'distinct'
        ]);
    }

    protected function updatingItem()
    {
        foreach ($this->products as $value) {
            $product = $this->referral->products()->where('products.id', $value['id']);
            if ($product->exists()) {
                $product1 = $product->first();
                $newStock = ($value['pivot']['quantity'] - $product1->pivot->quantity);
                $product1->stock += $newStock;
                $product1->save();
            } else {
                $product1 = Product::findOrFail($value['id']);
                $product1->stock += $value['pivot']['quantity'];
                $product1->save();
            }
            $data[$value['id']] = [
                'quantity' => $value['pivot']['quantity'],
                'unit_price' => $value['pivot']['unit_price']
            ];
        }
        return $data;
    }
}
