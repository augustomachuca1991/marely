<?php

namespace App\Http\Livewire\Referrals;

use App\Models\Referral;
use Livewire\Component;
use Livewire\WithPagination;

class IndexReferral extends Component
{
    use WithPagination;

    public $perPage = 20;
    public $search = "";
    public $isOpenShow = false;

    protected $listeners = ['render' , 'closeModal'];

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 20]
    ];
    
    public function render()
    {
        return view('livewire.referrals.index-referral' , [
            'referrals' => Referral::latest()->paginate($this->perPage)
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function closeModal()
    {
        $this->reset(['isOpenShow']);
        
    }


    public function show(Referral $referral)
    {
        $this->referral = $referral;
        $this->isOpenShow = true;
    }
}
