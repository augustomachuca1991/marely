<?php

namespace App\Http\Livewire\Components;

use App\Models\User;
use Livewire\Component;

class SelectUser extends Component
{



    public $user;
    public $selectUser = false;

    public function render()
    {
        return view('livewire.components.select-user',[
            'users' => $this->getUsers()
        ]);
    }

    public function getUsers()
    {
        return User::all();
    }


    public function selectedUser(User $user)
    {
        $this->user = $user;
        $this->selectUser = false;
        $this->emitUp('selectedUser' , $this->user);
    }
}
