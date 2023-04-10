<?php

namespace App\Http\Livewire\Providers;

use App\Models\Inventories\Town;
use App\Models\regimen;
use App\Models\State;
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
        $this->states = State::all();
        $this->regimens = regimen::orderby('id_regimens')->pluck('name');
        $this->digits = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        return view('livewire.providers.providers-create');
    }

    public function updatedselectedState()
    {
        $this->towns = Town::where('ID_STATE', $this->selectedState)->get();

    }
}
