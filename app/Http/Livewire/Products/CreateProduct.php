<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class CreateProduct extends Component
{
    public $code;
    public $name;
    public $description;
    public $stock;
    public $list_price;
    public $sale_price;
    public $category;
    public $isOpenCreate = false;

    protected $rules = [
        'code' => 'required|unique:products,code',
        'name' => 'required|max:50|unique:products,name',
        'description' => 'required|max:255',
        'stock' => 'required|integer',
        'list_price' => 'required|numeric',
        'sale_price' => 'required|numeric',
        'category' => 'required'
    ];

    public function render()
    {
        return view('livewire.products.create-product');
    }

    public function store(){
        $this->validate();
        $product = new Product();
        $product->category_id = $this->category;
        $product->code = $this->code;
        $product->name = $this->name;
        $product->description = $this->description;
        $product->stock = $this->stock;
        $product->list_price = $this->list_price;
        $product->sale_price = $this->sale_price;
        $product->save();
        $this->resetData();
        $this->emitTo('products.index-product', 'render');
    }


    public function resetData(){
        $this->reset(['isOpenCreate' , 'name', 'description','code' ,'stock' , 'list_price' , 'sale_price' , 'category']);
    }
}
