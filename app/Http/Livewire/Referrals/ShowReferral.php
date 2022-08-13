<?php

namespace App\Http\Livewire\Referrals;

use Livewire\Component;

class ShowReferral extends Component
{
    
    
    public $referral;
    public $isOpenShow = false;

    public function mount($referral)
    {
        $this->referral = $referral;
        $this->isOpenShow = true;
    }
    
    public function render()
    {
        return view('livewire.referrals.show-referral');
    }


    public function resetData()
    {
        $this->reset(['isOpenShow']); 
        $this->emitTo('referrals.index-referral' , 'closeModal');
    }
}
