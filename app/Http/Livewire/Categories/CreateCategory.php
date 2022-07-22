<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;

class CreateCategory extends Component
{
    public $name;
    public $description;
    public $isOpenCreate = false;

    protected $rules = [
        'name' => 'required|max:50|unique:categories,name',
        'description' => 'required|max:255',
    ];


    public function render()
    {
        return view('livewire.categories.create-category');
    }

    public function store(){
        $this->validate();
        $category = new Category();
        $category->name = $this->name;
        $category->description = $this->description;
        $category->save();
        $this->resetData();
        $this->emitTo('categories.index-category', 'render');
    }

    public function resetData(){
        $this->reset(['isOpenCreate' , 'name', 'description']);
    }
}
