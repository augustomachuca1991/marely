<?php

namespace App\Http\Livewire\Referrals;

use App\Models\Referral;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class IndexReferral extends Component
{
    use WithPagination, LivewireAlert;

    public $perPage = 20;
    public $search = "";
    public $isOpenShow = false;

    protected $listeners = ['render' , 'closeModal', 'delete'];

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 20]
    ];
    
    public function render()
    {
        return view('livewire.referrals.index-referral' , [
            'referrals' => Referral::searchSupplier($this->search)->latest()->paginate($this->perPage)
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

    public function delete(Referral $referral)
    {
        $this->referral = $referral;
        foreach ($this->referral->products as $key => $product) {
            $product->stock -= $product->pivot->quantity;
            $product->save();
            $product->referrals()->detach($this->referral->id);
        }
        $this->referral->delete();
        $this->alert('success', 'La orden nº "#000'.$this->referral->id .'" se dio de baja');
        $this->closeModal();
    }
}
