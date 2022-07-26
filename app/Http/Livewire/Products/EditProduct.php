<?php

namespace App\Http\Livewire\Products;
use Livewire\Component;

class EditProduct extends Component
{

    public $product;
    public $isOpenEdit = false;


    function rules() {
        return [
            'product.code' => 'required|max:50|unique:products,code,'.$this->product->id,
            'product.name' => 'required|max:50|unique:products,name,'.$this->product->id,
            'product.description' => 'required|max:255',
            'product.stock' => 'required|integer',
            'product.list_price' => 'required|numeric',
            'product.sale_price' => 'required|numeric',
            'product.category_id' => 'required',
        ];
    }

    public function mount($product)
    {
        $this->product = $product;
        $this->isOpenEdit = true;
    }

    public function render()
    {
        return view('livewire.products.edit-product');
    }


    public function update()
    {
        $validatedData = $this->validate();
        dd('todo ok');
        // $this->user->update($validatedData);
    }


    public function resetData()
    {
        $this->reset('isOpenEdit');
        $this->emitTo('products.index-product','closeModal');
    }
}
