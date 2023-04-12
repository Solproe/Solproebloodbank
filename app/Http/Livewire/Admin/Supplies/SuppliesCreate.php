<?php

namespace App\Http\Livewire\Admin\Supplies;

use App\Models\status\status;
use Livewire\Component;

class SuppliesCreate extends Component
{
    public function render()
    {
        $status = status::all();
        return view('livewire.admin.supplies.supplies-create', compact('status'));
    }
}
