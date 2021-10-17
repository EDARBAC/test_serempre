<?php

namespace App\Http\Livewire\Cities;

use Livewire\Component;
use App\Models\City;

class Form extends Component
{
    public $city;

    protected function rules()
    {
        $codRules = ['required','string','max:100','unique:city,cod'];
        if(!empty($this->city->cod)) $codRules[3] .= ",{$this->city->cod}";

        return [
            'city.cod' => $codRules,
            'city.name' => ['required','string','max:255']
        ];
    }

    public function mount(City $city)
    {
        $this->city = $city;
    }

    public function render()
    {
        return view('livewire.cities.form');
    }

    public function save(){

        $this->validate();

        $this->city->user_id;
        $this->city->save();

        $this->redirectRoute('cities.index');
    }
}
