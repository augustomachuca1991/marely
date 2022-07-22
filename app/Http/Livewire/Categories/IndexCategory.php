<?php

namespace App\Http\Livewire\Categories;

use Livewire\Component;

class IndexCategory extends Component
{
    public $perPage = 10;
    public $search = "";

    public function render()
    {
        return view('livewire.categories.index-category');
    }
}
