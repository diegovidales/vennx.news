<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Form;

class UserForm extends Form
{
    //
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function store()
    {
        // valida o formulário
        $userAttributes = $this->validate([
            'name' => ['required','min:5'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', Password::min(6)->letters()->numbers(), 'confirmed']
        ]);
        // cria o usuário
        $user = User::create($userAttributes);
        // realiza o login do usuário criado
        Auth::login($user);
    }

    public function login()
    {
        $userAttributes = $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        // tenta realizar a autenticação do usuário
        if(! Auth::attempt($userAttributes)) {
            throw ValidationException::withMessages([
                'user.email' => 'Sorry, email or password invalid'
            ]);
        }
        // regenera a session ID prevenindo session fixation attack
        request()->session()->regenerate();
    }
}
