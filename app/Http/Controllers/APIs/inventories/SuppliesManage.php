<?php

namespace App\Http\Controllers\APIs\inventories;

use App\Http\Controllers\Controller;
use App\Models\Inventories\supplies\supplies;
use Illuminate\Http\Request;

class SuppliesManage extends Controller
{


    public function getAllSupplies(Request $request)
    {
        $allSupplies = supplies::all();

        $allSupplies = json_encode($allSupplies);

        return $allSupplies;
    }
}
