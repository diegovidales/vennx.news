<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\UserForm;
use Livewire\Component;

class Login extends Component
{
    public UserForm $user;
    
    public function login()
    {
        $this->user->login();
        $this->redirectRoute('my_news');
    }
}
