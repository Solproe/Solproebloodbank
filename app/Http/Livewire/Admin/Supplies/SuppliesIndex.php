<?php

namespace App\Http\Livewire\Admin\Supplies;

use App\Models\Inventories\supplies\supplies;
use App\Models\process\step_process;
use App\Models\status\status;
use Livewire\Component;

class SuppliesIndex extends Component
{
    public $allSupplies;
    public $allStatus;


    public function render()
    {
        $this->allSupplies = supplies::all();
        $this->allStatus = status::all();

        return view('livewire.admin.supplies.supplies-index');
    }
}
