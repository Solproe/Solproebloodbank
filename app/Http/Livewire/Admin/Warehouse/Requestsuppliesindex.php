<?php

namespace App\Http\Livewire\Admin\Warehouse;

use App\Models\Inventories\supplies\supplies;
use Livewire\Component;
use Livewire\WithPagination;

class Requestsuppliesindex extends Component
{
    use withPagination;
    protected $paginationTheme = "bootstrap";

    public $supplies;
    public $message;

    public function render()
    {
        $supplies = supplies::select('id', 'supply_name')->paginate(10)->links();
        return view('livewire.admin.warehouse.requestsuppliesindex');
    }
}
