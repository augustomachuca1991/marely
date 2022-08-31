<?php

namespace App\Http\Livewire\Shops;

use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class IndexShop extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $perPage = 20;
    public $search = "";
    public $byCategory = "";
    public $byStatus = "";
    public $bySupplier = "";

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

    protected $listeners = ['closeModal'];

    public function render()
    {
        return view('livewire.shops.index-shop', [
            'products' => $this->getProducts()
        ]);
    }


    public function getProducts()
    {
        return Product::searchProduct($this->search)
            ->searchCategory($this->byCategory)
            ->searchStatus($this->byStatus)
            ->latest()
            ->paginate($this->perPage);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function add_to_cart(Product $product)
    {

        Cart::session(auth()->id())->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->sale_price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));
        $this->alert('success', 'Se agregó un articulo al carrito', [
            'position' => 'bottom-end'
        ]);
        $this->emitTo('shops.cart-shop', 'render');
    }


    public function loadMore()
    {
        $this->perPage += $this->perPage;
    }

    public function closeModal()
    {
        $this->isOpenShow = false;
    }

    public function show(Product $product)
    {
        $this->product = $product;
        $this->isOpenShow = true;
    }
}
