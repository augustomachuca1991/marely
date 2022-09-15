<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class SelectPeriod extends Component
{

    public $from, $to;


    // public function updated($field)
    // {
    //     $this->validateOnly($field, [
    //         'from' => 'required|required_with:to',
    //         'to' => 'required|required_with:from'
    //     ]);
    // }

    public function render()
    {
        return view('livewire.components.select-period');
    }
}
