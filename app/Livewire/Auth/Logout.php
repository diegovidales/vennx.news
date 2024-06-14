<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
    public $responsive = false;

    public function logout()
    {
        Auth::logout();
        $this->redirectRoute('news');
    }
}
