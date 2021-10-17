<?php

namespace App\Http\Livewire\Clients;

use App\Models\City;
use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $queryString = ['city','perPage'];

    public $cities;

    /* Filters */
    public $city;
    public $perPage = '5';
    /* ******* */

    public function mount(){
        $this->cities = City::orderBy('name')->get();
    }

    public function render()
    {
        $clients = Client::with('cityy');
        if(!empty($this->city)){
            $clients->where('city',$this->city);
        }
        $clients = $clients->latest()->paginate($this->perPage);

        return view('livewire.clients.index', ['clients' => $clients]);
    }
    
    public function delete(Client $client){
        $client->delete();
    }
}
