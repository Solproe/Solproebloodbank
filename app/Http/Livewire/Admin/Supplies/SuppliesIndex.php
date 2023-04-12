<?php

namespace App\Http\Livewire\Admin\Supplies;

use App\Models\Inventories\supplies\supplies;
use App\Models\process\step_process;
use App\Models\status\status;
use Livewire\Component;

class SuppliesIndex extends Component
{
    public function render()
    {
        $supplies = supplies::all();
        $status = status::all();
        $process = step_process::all();

        return view('livewire.admin.supplies.supplies-index', compact('supplies', 'status', 'process'));
    }
}
