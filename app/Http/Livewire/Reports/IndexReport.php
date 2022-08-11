<?php

namespace App\Http\Livewire\Reports;

use App\Models\Sale;
use App\Models\User;
use Livewire\Component;
use PDF;

class IndexReport extends Component
{
    


    public $search = "";
    public $perUser = "";
    public $from = "";
    public $to = "";
    public $perPage = 10;
    public $user;
    public $selectUser = false;


    protected $listeners = ['render'];

    public function render()
    {
        $sales = Sale::searchSale($this->search)
        ->searchUser($this->perUser)
        ->fromTo($this->from, $this->to)
        ->paginate($this->perPage);
        return view('livewire.reports.index-report', [
            'sales' => $sales
        ]);
    }


    public function filterDate()
    {
        $this->validate([
            'from' => 'required|required_with:to|date|lte:to',
            'to' => 'required_with:from|date|gte:from'
        ]);
        dd('ok');
        // $this->emitSelf('render');

    }


    public function selectedUser(User $user)
    {
        $this->user = $user;
        $this->perUser = $this->user->id;
        $this->selectUser = false;
    }

}
