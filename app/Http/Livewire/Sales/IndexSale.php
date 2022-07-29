<?php

namespace App\Http\Livewire\Sales;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class IndexSale extends Component
{
    use WithPagination;

    public $perPage = 20;
    public $search = "";
    public $byCategory = "";
    public $byStatus = "";
    public $bySupplier= "";

    // public $product;
    // public $isOpenEdit = false;
    // public $isOpenShow = false;


    protected $queryString = [
        'search' => ['except' => ''],
        'byCategory' => ['except' => ''],
        'byStatus' => ['except' => ''],
        'bySupplier' => ['except' => ''],
        'perPage' => ['except' => 20]
    ];

    public function render()
    {
        $products = Product::searchProduct($this->search)
        ->searchCategory($this->byCategory)
        ->searchStatus($this->byStatus)
        ->latest()
        ->paginate($this->perPage);
        return view('livewire.sales.index-sale', [
            'products' => $products
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function add_to_cart(Product $product)
    {
        \Cart::session(auth()->id())->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->list_price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));
    }


    public function loadMore()
    {
        $this->perPage += $this->perPage;
    }
}
