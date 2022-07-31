<?php

namespace App\Http\Livewire\Audits;

use App\Models\Sale;
use Livewire\Component;

class ShowSale extends Component
{

    public function render()
    {
        $sales = Sale::all();
        return view('livewire.audits.show-sale' , [
            'sales' => $sales
        ]);
    }



}
