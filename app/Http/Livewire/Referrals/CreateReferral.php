<?php

namespace App\Http\Livewire\Referrals;

use App\Models\Product;
use App\Models\Referral;
use App\Models\Supplier;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CreateReferral extends Component
{
    use LivewireAlert;

    public $isOpenCreate = false;
    public $bonification = 0;
    public $supplier;
    public $product;

    public $editMode = false;
    public $i;
    public $price;


    public $productsAdd = [];
    public $addStock = [];

    protected $messages = [


        'addStock.*.required' => 'Este campo es obligatorio',
        'addStock.*.integer' => 'El valor ingresado debe ser un numero entero',
        'addStock.*.min' => 'Debe cargar al menos un articulo',
        'productsAdd.*.id.distinct' => 'Debe cargar al menos un articulo',


    ];


    protected $listeners = ['loadProduct', 'loadSupplier'];

    public function render()
    {

        return view('livewire.referrals.create-referral');
    }

    public function loadSupplier(Supplier $supplier)
    {
        $this->supplier = $supplier;
    }


    public function loadProduct(Product $product)
    {
        $this->product = $product;
        array_push($this->productsAdd, $this->product);
        array_push($this->addStock, 0);
    }


    public function quit()
    {
        $this->reset(['supplier']);
    }


    public function removeItem($index)
    {
        unset($this->productsAdd[$index]);
        unset($this->addStock[$index]);
    }


    public function store()
    {
        $this->validate([
            'addStock.*' => 'required|integer|min:1',
            'bonification' => 'numeric|nullable',
            'productsAdd.*.id' => 'distinct'
        ]);
        $referral = new Referral();
        $referral->bonification = $this->bonification;
        $referral->supplier_id = $this->supplier->id;
        $referral->save();
        foreach ($this->addStock as $key => $value) {
            $referral->products()->attach($this->productsAdd[$key]['id'], [
                'quantity' => $value,
                'unit_price' => $this->productsAdd[$key]['list_price'],
            ]);
            $product = Product::findOrFail($this->productsAdd[$key]['id']);
            $product->stock += $value;
            $product->list_price = $this->productsAdd[$key]['list_price'];
            $product->save();
        }
        $this->reset('addStock', 'productsAdd', 'isOpenCreate', 'bonification', 'supplier');
        $this->alert('success', 'Se ha cargado un nuevo remito');
        $this->emitTo('referrals.index-referral', 'render');
    }

    public function editPrice($i, $price)
    {
        $this->i = $i;
        $this->price = $price;
        $this->editMode = true;
    }
}
