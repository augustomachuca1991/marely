<?php

namespace App\Http\Livewire\Categories;

use Livewire\Component;

class EditCategory extends Component
{
    public $isOpenEdit = false;
    public $category;

    protected $rules = [
        'category.name' => 'required|max:50',
        'category.description' => 'required|max:255',
    ];

    public function mount($category){
        $this->category = $category;
        $this->isOpenEdit = true;
    }

    public function render()
    {
        return view('livewire.categories.edit-category');
    }


    public function update(){
        $this->validate();
        $this->category->updated_at = now();
        $this->category->save();
        $this->emitTo('categories.index-category', 'closeModal', 'render');
        $this->resetData();
    }

    public function resetData()
    {
        $this->reset('isOpenEdit');
        $this->emitTo('categories.index-category','closeModal');
    }
}
