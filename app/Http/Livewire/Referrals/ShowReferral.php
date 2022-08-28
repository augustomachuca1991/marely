<?php

namespace App\Http\Livewire\Referrals;

use Livewire\Component;

class ShowReferral extends Component
{
    
    
    public $referral;
    public $isOpenShow = false;
    public $total = 0;

    public function mount($referral)
    {
        $this->referral = $referral;
        foreach ($this->referral->products as $key => $value) {
            $this->total +=  $value->pivot->quantity * $value->pivot->unit_price;
        }
        $this->total -= ($this->total * $this->referral->bonification)/100;  
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
