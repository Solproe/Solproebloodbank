<?php

namespace App\Http\Livewire\Accountings;

use App\Models\Inventories\supplies\supplies;
use App\Models\provider\Provider;
use Livewire\Component;

class PettycashCreate extends Component
{
    public $dates;
    public $numeracion;
    public $motions;
    public $documents;
    public $providers;
    public $supplies;

    public function render()
    {
        $this->providers = Provider::all();
        $this->supplies = supplies::all();
        return view('livewire.accountings.pettycash-create');
    }
}
