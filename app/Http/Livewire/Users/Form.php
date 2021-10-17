<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Form extends Component
{
    public $user;

    protected function rules()
    {
        $rules = [
            'user.email' => ['required','string','max:100','unique:users,email'],
            'user.name' => ['nullable','string','max:255'],
            'user.photo' => ['mimes:jpg,png','max:5000']
        ];

        if(!empty($this->user->id)){
            $rules['user.email'][3] .= ",{$this->user->email}";
            $rules['user.password'] = ['required','min:8'];
        } 

        return $rules;
    }

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.users.form');
    }

    public function save(){

        $this->validate();

        $this->user->save();

        $this->redirectRoute('users.index');
    }
}
