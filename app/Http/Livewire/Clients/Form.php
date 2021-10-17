<?php

namespace App\Http\Livewire\Clients;

use App\Models\City;
use App\Models\Client;
use Livewire\Component;

class Form extends Component
{
    public $client;

    public $cities;

    protected $rules = [
        'client.name' => ['required','string','max:255'],
        'client.city' => ['required','exists:cities,cod']
    ];

    public function mount(Client $client)
    {
        $this->client = $client;
        $this->cities = City::orderBy('name')->get();
    }

    public function render()
    {
        return view('livewire.clients.form');
    }

    public function save(){

        $this->validate();

        $this->client->user_id = auth()->user()->id;
        $this->client->save();

        $this->redirectRoute('clients.index');
    }
}
