<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class IndexCategory extends Component
{
    use WithPagination, LivewireAlert;


    public $perPage = 10;
    public $search = "";

    public $category;
    public $isOpenShow = false;
    public $isOpenEdit = false;


    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10]
    ];

    protected $listeners = ['render' , 'closeModal', 'delete'];

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

    public function confirmDelete(Category $category){
        $this->category = $category;
        $this->confirm('Desea dar de esta categoria?', [
            'onConfirmed' => 'delete',
        ]);
        //$this->category->delete();
    }

    public function closeModal(){
        $this->isOpenShow = false;
        $this->isOpenEdit = false;
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function delete(){
        $name = $this->category->name;
        if ($this->category->products()->exists()) {
            $msj = "La categoria " . $name . " tiene productos asociados esto puede ocasionar problemas en el sistema";
            $condition = 'error';
        }else{
            $this->category->delete();
            $msj = "La categoria ".$name." ha sido eliminada";
            $condition = 'success';
        }
        $this->alert($condition , $msj);
    }
}
