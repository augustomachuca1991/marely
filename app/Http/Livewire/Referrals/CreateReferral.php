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
    public $bonification;

    public $supplierText = '';
    public $suggestionSupplier = false;
    public $supplier;

    public $productText = '';
    public $suggestionProduct = false;
    public $product;

    public $editMode = false;


    public $productsAdd = [];
    public $addStock = [];
    
    public function render()
    {
        $suppliers = Supplier::search($this->supplierText)->take(5)->get();
        $products = Product::searchProduct($this->productText)->take(5)->get();
        return view('livewire.referrals.create-referral',[
            'suppliers' => $suppliers,
            'products' => $products
        ]);
    }

    public function loadSupplier(Supplier $supplier)
    {
        $this->supplierText = $supplier->company_name;
        $this->suggestionSupplier = false;
        $this->supplier = $supplier;
    }


    public function loadProduct(Product $product)
    {
        $this->productText = $product->name;
        $this->suggestionProduct = false;
        $this->product = $product;
        array_push($this->productsAdd, $product);
        array_push($this->addStock, 0);
        $this->reset(['productText']);
        //$this->listProducts = Product::whereIn('id' , $this->productsAdd)->get();
    }


    public function quit()
    {
        $this->reset(['supplier' , 'supplierText']);
    }

    public function removeItem($index){
        unset($this->productsAdd[$index]);
    }

    public function store()
    {
        
        $this->validate([
            'addStock.*' => 'required|integer|min:0',
            'bonification' => 'numeric'
        ]);
        $referral = new Referral();
        $referral->bonification = $this->bonification;
        $referral->supplier_id = $this->supplier->id;
        $referral->created_at = now();
        $referral->save();
        foreach ($this->addStock as $key => $value) {
            $referral->products()->attach( $this->productsAdd[$key]['id'] , [
                'quantity' => $value,
                'unit_price' => $this->productsAdd[$key]['list_price'],
            ]);
            //$this->productsAdd[$key]['stock'] += $value;
        }
        $this->reset('addStock' , 'productsAdd', 'isOpenCreate');
        $this->alert('success' , 'Se ha cargado un nuevo remito');
        $this->emitTo('referrals.index-referral', 'render');
        
    }
}
