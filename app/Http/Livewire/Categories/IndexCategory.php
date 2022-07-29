<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class IndexCategory extends Component
{
    use WithPagination;


    public $perPage = 10;
    public $search = "";

    public $category;
    public $isOpenShow = false;
    public $isOpenEdit = false;


    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10]
    ];

    protected $listeners = ['render' , 'closeModal'];

    public function render()
    {

        return view('livewire.categories.index-category',[
            'categories' => Category::searchCategory($this->search)->latest()->paginate($this->perPage)
        ]);
    }

    public function show(Category $category){
        $this->category = $category;
        $this->isOpenShow = true;
    }


    public function edit(Category $category){
        $this->category = $category;
        $this->isOpenEdit = true;
    }

    public function delete(Category $category){
        $this->category = $category;
        $this->category->delete();
    }

    public function closeModal(){
        $this->isOpenShow = false;
        $this->isOpenEdit = false;
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }
}
