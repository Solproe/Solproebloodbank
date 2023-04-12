<?php

namespace App\Http\Livewire\Admin\Warehouse;

use App\Models\Inventories\supplies\supplies;
use Livewire\Component;

class Requestsuppliesindex extends Component
{
    public $supplies;

    public function render()
    {
        $supplies = supplies::all();
        return view('livewire.admin.warehouse.requestsuppliesindex');
    }
}
