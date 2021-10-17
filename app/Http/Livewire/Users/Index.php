<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\WithPagination;
use Livewire\Component;

class Index extends Component
{
    use WithPagination;

    protected $queryString = ['perPage'];

    /* Filters */
    public $perPage = '5';
    /* ******* */

    public function render()
    {
        $users = User::where('id','<>',auth()->user()->id)->latest()->paginate($this->perPage);

        return view('livewire.users.index', ['users' => $users]);
    }
    
    public function delete(User $user){
        $user->delete();
    }
}
