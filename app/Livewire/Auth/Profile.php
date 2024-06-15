<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\UserForm;
use Livewire\Component;

class Profile extends Component
{
    public UserForm $user;
    public $showPasswordChangeSuccessIndicator = false;
    public $showProfileSuccessIndicator = false;
    
    public function mount()
    {
        $this->user->name = auth()->user()->name;
        $this->user->email = auth()->user()->email;
    }

    public function update()
    {
        $this->user->update();
        $this->showProfileSuccessIndicator = true;
    }

    public function changePassword()
    {
        $this->user->changePassword();
        $this->showPasswordChangeSuccessIndicator = true;
    }
}
