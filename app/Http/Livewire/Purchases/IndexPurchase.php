<?php

namespace App\Http\Livewire\Purchases;

use App\Models\Referral;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPurchase extends Component
{
    use WithPagination;

    public $perPage = 20;
    public $search = "";

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 20]
    ];
    
    public function render()
    {
        return view('livewire.purchases.index-purchase' , [
            'referrals' => Referral::latest()->paginate($this->perPage)
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
