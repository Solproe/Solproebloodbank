<?php

namespace App\Http\Livewire\Admin\Warehouse;

use App\Models\inventories\supplies\Order_Request;
use Livewire\Component;

class RequestSuppliesIndex extends Component
{

    public $order_requests;

    public function render()
    {

        

        return view('livewire.admin.warehouse.request-supplies-index');
    }
}
