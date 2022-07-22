<?php

namespace App\Http\Livewire\Categories;

use Livewire\Component;

class CreateCategory extends Component
{
    public $isOpenCreate = true;
    
    public function render()
    {
        return view('livewire.categories.create-category');
    }
}
