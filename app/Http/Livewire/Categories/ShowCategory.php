<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;

class ShowCategory extends Component
{
    public $isOpenShow = false;
    public $category;

    public function mount($category){
        $this->category = $category;
        $this->isOpenShow = true;
    }

    public function render()
    {
        return view('livewire.categories.show-category');
    }

    public function resetData()
    {
        $this->reset('isOpenShow');
        $this->emitTo('categories.index-category','closeModal');
    }
}
