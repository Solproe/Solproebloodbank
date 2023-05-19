<?php

namespace App\Http\Livewire\Admin\Warehouse;

use App\Models\inventories\supplies\Order_Request;
use Livewire\Component;

class RequestSuppliesIndex extends Component
{
    public function render()
    {
        $order_requests = Order_Request::all();
        return view('livewire.admin.warehouse.request-supplies-index', ['order_requests' => $order_requests]);
    }
}
