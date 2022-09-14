<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class SelectPeriod extends Component
{

    public $from;
    public $to;

    public function render()
    {
        return view('livewire.components.select-period');
    }
}
