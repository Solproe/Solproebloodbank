<?php

namespace App\Http\Livewire\Admin\Warehouse;

use App\Http\Controllers\Admin\inventories\warehouse\warehouse_movement;
use App\Models\Inventories\storage\warehouse_movement as StorageWarehouse_movement;
use App\Models\inventories\supplies\Order_Request;
use Livewire\Component;

class RequestSuppliesIndex extends Component
{

    public $order_requests;

    public function render()
    {
        $this->order_requests = StorageWarehouse_movement::all();
        return view('livewire.admin.warehouse.request-supplies-index');
    }
}
