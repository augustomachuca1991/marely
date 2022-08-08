<?php

namespace App\Http\Livewire\Suppliers;

use Livewire\Component;

class CreateSupplier extends Component
{
    public $company_name = '';
    public $location = '';
    public $phone_number = '';

    
    protected $rules =[
        'company_name' => 'required|max:50',
        'location' => 'string|max:100',
        'phone_number' => 'numeric|digits:10'

    ];
    
    public function render()
    {
        return view('livewire.suppliers.create-supplier');
    }


    public function store(){
        $this->validate();

        dd('save');

    }
}
