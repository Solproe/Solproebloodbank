<?php

namespace App\Http\Controllers\Admin\inventories\orders;

use App\Http\Controllers\admin\inventories\supplies\SupplyController;
use App\Http\Controllers\Controller;
use App\Models\Inventories\Order\RequestOrder;
use App\Models\Inventories\Order\SuppliesOrder as OrderSuppliesOrder;
use App\Models\Inventories\storage\warehouse_movement;
use App\Models\Inventories\supplies\supplies;
use App\Models\provider\Provider;
use App\Models\status\status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuppliesOrder extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = RequestOrder::all();

        $suppliesorder = OrderSuppliesOrder::all();

        return $suppliesorder;

        return view('admin.inventories.orders.index', compact('orders', 'suppliesorder'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supplies = supplies::where('status', '=', 1)->get();

        $data = array();

        foreach ($supplies as $supply) {
            $warehouse = warehouse_movement::where('id_supply', '=', $supply->id)->first();

            if (isset($warehouse) and $warehouse->id != null) {
                $data[] = [$supply->supply_name => $warehouse->balance];
            } else {
                $data[] = [$supply->supply_name => 0];
            }
        }

        $providers = Provider::all();

        return view('admin.inventories.orders.create', compact('providers', 'data', 'supplies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($request->provider) && $request->provider != null) {
            $requestorder = RequestOrder::create([
                'id_applicant' => Auth::user()->id,
                'status' => 'pendiente',
                'id_provider' => $request->provider,
                'ordertype' => $request->ordertype
            ]);
        }
        else
        {
            $requestorder = RequestOrder::create([
                'id_applicant' => Auth::user()->id,
                'status' => 'pendiente',
                'ordertype' => $request->ordertype
            ]);
        }

        foreach ($request->quantity as $key => $value) {
            if ($value != null) 
            {
                $data = null;

                foreach ($request->price as $price)
                {
                    if (isset($price[$key]) && $price[$key] != null)
                    {
                        $data = $price[$key];
                    }
                }
                $supplies = OrderSuppliesOrder::create([
                    'id_order' => $requestorder->id,
                    'id_supplies' => $key,
                    'quantity' => $value,
                    'price' => $data
                ]);
            }
        }

        return redirect()->route('admin.inventories.suppliesorder.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requestorder = RequestOrder::find($id);

        $requestsupplies = OrderSuppliesOrder::where('id_order', '=', $requestorder->id)->get();

        return view('admin.inventories.orders.edit', compact('requestorder', 'requestsupplies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestsupplies = OrderSuppliesOrder::where('id_order', '=', $id)->get();

        foreach ($requestsupplies as $requestsupply) 
        {
            if (isset($request->quantity[$requestsupply->id_supplies])) 
            {
                $requestsupply->quantity = $request->quantity[$requestsupply->id_supplies];

                $requestsupply->save();
            }
        }

        if ($request->status[$id] != null) 
        {
            $requestorder = RequestOrder::find($id);

            $requestorder->status = $request->status[$id];

            $requestorder->save();
        }

        return redirect()->route('admin.inventories.suppliesorder.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
