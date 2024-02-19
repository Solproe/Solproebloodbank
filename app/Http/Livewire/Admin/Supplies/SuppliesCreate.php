<?php

namespace App\Http\Livewire\Admin\Supplies;

use App\Models\provider\Provider;
use App\Models\status\status;
use Livewire\Component;

class SuppliesCreate extends Component
{

    public $status;

    public $providers;
    
    public function render()
    {
        $this->status = status::all();

        $this->providers = Provider::all();

        return view('livewire.admin.supplies.supplies-create');
    }
}
