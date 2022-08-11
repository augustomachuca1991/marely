<?php

namespace App\Http\Livewire\Purchases;

use App\Models\Product;
use App\Models\Supplier;
use Livewire\Component;

class CreatePurchase extends Component
{
    
    public $isOpenCreate = false;

    public $supplierText = '';
    public $suggestionSupplier = false;
    public $supplier;

    public $productText = '';
    public $suggestionProduct = false;
    public $product;
    
    public function render()
    {
        $suppliers = Supplier::search($this->supplierText)->take(5)->get();
        $products = Product::searchProduct($this->productText)->take(5)->get();
        return view('livewire.purchases.create-purchase',[
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
    }
}
