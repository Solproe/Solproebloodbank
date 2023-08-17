<?php

namespace App\Http\Livewire\Admin;

use App\Models\Inventories\Town;
use App\Models\State;
use Livewire\Component;

class SelectAnidado extends Component
{
    public $selectedState = null, $selectedTown = null;
    public $towns = null;

    public function render()
    {
        $states = state::all();

        return view('livewire.admin.requestorings-create', compact('states'));

    }

    public function updatedselectedState($ID_STATE)
    {
        $this->towns = Town::where('ID_STATE', $ID_STATE)->get();
    }
}
