<?php

namespace App\Http\Livewire\Audits;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class IndexAudit extends Component
{
    use LivewireAlert;

    public $select;

    protected $listeners = ['close'];

    public function render()
    {
        return view('livewire.audits.index-audit');
    }

    public function close()
    {
        $this->reset('select');
    }
}
