<?php

namespace App\Http\Livewire\Products;
use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class EditProduct extends Component
{

    use WithFileUploads;
    use LivewireAlert;


    public $product;
    public $photoEdit;
    public $isOpenEdit = false;


    function rules() {
        return [
            'product.code' => 'required|max:50|unique:products,code,'.$this->product->id,
            'product.name' => 'required|max:50|unique:products,name,'.$this->product->id,
            'product.description' => 'required|max:255',
            // 'product.stock' => 'required|integer',
            // 'product.list_price' => 'required|numeric',
            'product.sale_price' => 'required|numeric',
            'product.category_id' => 'required',
            'photoEdit' => 'image|max:1024|nullable',
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
        if ($this->photoEdit) {
            $this->product->profile_photo_path = $this->photoEdit->store('products' , 'public');
        }
        $this->product->updated_at = now();
        $this->product->save();
        $this->alert('success', 'El Articulo ha sido actualizado');
        $this->emitTo('products.index-product', 'render');
        $this->resetData();
    }


    public function resetData()
    {
        $this->reset('isOpenEdit');
        $this->emitTo('products.index-product','closeModal');
    }
}
