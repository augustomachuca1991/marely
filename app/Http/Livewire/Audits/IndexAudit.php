<?php

namespace App\Http\Livewire\Audits;

use App\Models\Referral;
use App\Models\Sale;
use Livewire\Component;

class IndexAudit extends Component
{

    public function render()
    {
        $out = $this->getBalanceOut();
        $in =  $this->getBalanceIn();
        $balance = $this->getBalance();
        return view('livewire.audits.index-audit' , [
            'out' => $out,
            'in' => $in,
            'balance' => $balance
        ]);
    }

    public function getBalanceOut()
    {
        $out = 0;
        $referrals = Referral::all();
        foreach ($referrals as $referral) {
            $out += $referral->getTotalAmount();
        }
        return $out;
    }


    public function getBalanceIn()
    {
        $in = 0;
        $sales = Sale::all();
        foreach ($sales as $sale) {
            $in += $sale->sum('amount');
        }
        return $in;
    }


    public function getBalance()
    {
        return $this->getBalanceOut() - $this->getBalanceIn();
    }
}
