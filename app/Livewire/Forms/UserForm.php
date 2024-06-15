<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
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
    public $current_password;

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

    public function update()
    {
        // valida o formulário
        $userAttributes = $this->validate([
            'name' => ['required','min:5'],
            'email' => ['required', 'email', Rule::unique('users')->ignore(auth()->id())],
        ]);
        // atualiza usuário
        $user = auth()->user();
        $user->update($userAttributes);
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

    public function changePassword()
    {
        // confirma senha antiga
        if (! Hash::check($this->current_password, auth()->user()->password)) {
            throw ValidationException::withMessages([
                'user.current_password' => 'Incorrect password'
            ]);
        }
        // valida a nova senha
        $userAttributes = $this->validate([
            'password' => ['required', Password::min(6)->letters()->numbers(), 'confirmed']
        ]);
        
        // atualiza a senha
        $user = auth()->user();
        $user->update($userAttributes);
        // reinicia variáveis de senha
        $this->password = null;
        $this->current_password = null;
        $this->password_confirmation = null;
    }
}
