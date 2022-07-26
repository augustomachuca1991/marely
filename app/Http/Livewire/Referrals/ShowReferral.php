<?php

namespace App\Http\Livewire\Referrals;

use App\Models\Referral;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ShowReferral extends Component
{
    use LivewireAlert;

    public $referral;
    public $isOpenShow = false;


    protected $listeners = ['confirmed', 'confirmedEdit', 'resetData'];

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
        $this->emitTo('referrals.index-referral', 'closeModal');
    }

    public function cancelOrder(Referral $referral)
    {
        $this->referral = $referral;
        $this->confirm('Desea cancelar esta orden de compra?', [
            'onConfirmed' => 'confirmed',
        ]);
    }


    public function editOrder(Referral $referral)
    {
        $this->referral = $referral;
        $this->emitTo('referrals.index-referral', 'editRererral', $this->referral);
    }


    public function confirmed()
    {
        $this->emitTo('referrals.index-referral', 'delete', $this->referral);
    }


    public function confirmedEdit()
    {
        dd('editado');
        // $this->emitTo('referrals.index-referral', 'delete', $this->referral);
    }
}
