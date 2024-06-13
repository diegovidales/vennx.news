<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\UserForm;
use Livewire\Component;

class Register extends Component
{
    public UserForm $user;

    public function store()
    {
        $this->user->store();
        $this->redirectRoute('my_news');
    }

    public function mount()
    {
        if(auth()->check()) {
            $this->redirectRoute('my_news');
        }
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
