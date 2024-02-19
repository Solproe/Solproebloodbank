<?php

namespace App\Http\Livewire\Providers;

use App\Models\countriesstatestowns\Town as CountriesstatestownsTown;
use App\Models\regimen;
use Livewire\Component;

class ProvidersCreate extends Component
{
    public $towns;
    public $states;
    public $digits;
    public $regimens;
    public $selectedState;
    public $selectedTown;
    public $providers;

    public function render()
    {
        $this->towns = CountriesstatestownsTown::pluck('name', 'ID_TOWN');

        $this->regimens = regimen::pluck('name', 'id');
        
        $this->digits = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        return view('livewire.providers.providers-create');
    }

    public function updatedselectedState()
    {
        $this->towns = CountriesstatestownsTown::where('ID_STATE', $this->selectedState)->get();

    }
}
