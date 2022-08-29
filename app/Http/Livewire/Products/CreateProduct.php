<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CreateProduct extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public $photo;
    public $code;
    public $name;
    public $description;
    public $stock;
    public $list_price;
    public $sale_price;
    public $isOpenCreate = false;
    public $category = '';

    protected $rules = [
        'code' => 'required|unique:products,code',
        'name' => 'required|max:50|unique:products,name',
        'description' => 'required|max:255',
        // 'stock' => 'required|integer',
        // 'list_price' => 'required|numeric',
        'sale_price' => 'required|numeric',
        'category' => 'required',
        'photo' => 'image|max:1024|nullable',
    ];

    public function render()
    {
        return view('livewire.products.create-product');
    }

    public function store()
    {
        $this->validate();
        $product = new Product();
        $product->category_id = $this->category;
        $product->code = $this->code;
        $product->name = $this->name;
        $product->description = $this->description;
        $product->stock = 0;
        $product->list_price = 0;
        $product->sale_price = $this->sale_price;
        if ($this->photo) {
            $product->profile_photo_path = $this->photo->store('products' , 'public');
        }
        $product->save();
        $this->alert('success', 'Nuevo Articulo Creado');
        $this->resetData();
        $this->emitTo('products.index-product', 'render');
    }


    public function resetData()
    {
        $this->reset([
            'code',
            'isOpenCreate',
            'name',
            'description',
            'stock',
            'list_price',
            'sale_price',
            'category',
            'photo'
        ]);
    }
}
