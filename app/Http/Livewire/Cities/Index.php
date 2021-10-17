<?php

namespace App\Http\Livewire\Cities;

use App\Models\City;
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
        $cities = City::latest()->paginate($this->perPage);

        return view('livewire.cities.index', ['cities' => $cities]);
    }
    
    public function delete(City $city){
        $city->delete();
    }
}
