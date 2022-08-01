<?php

namespace App\Http\Livewire\Sales;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class IndexSale extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $perPage = 20;
    public $search = "";
    public $byCategory = "";
    public $byStatus = "";
    public $bySupplier= "";

    public $product;
    //public $isOpenEdit = false;
    public $isOpenShow = false;


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
        $this->alert('success' , 'Se agregó un articulo al carrito',[
            'position' => 'bottom-end'
        ]);
        \Cart::session(auth()->id())->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->sale_price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));
        $this->emitTo('shops.index-shop' , 'render');
    }


    public function loadMore()
    {
        $this->perPage += $this->perPage;
    }


    public function show(Product $product)
    {
        $this->product = $product;
        $this->isOpenShow = true;

    }
}
