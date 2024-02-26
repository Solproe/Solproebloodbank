<?php

namespace App\Http\Controllers\Admin\inventories\orders;

use App\Http\Controllers\admin\inventories\supplies\SupplyController;
use App\Http\Controllers\Controller;
use App\Models\Inventories\Order\RequestOrder;
use App\Models\Inventories\Order\SuppliesOrder as OrderSuppliesOrder;
use App\Models\Inventories\storage\warehouse_movement;
use App\Models\Inventories\supplies\supplies;
use App\Models\teams\Teams;
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

        return view('admin.inventories.orders.index', compact('orders', 'suppliesorder'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supplies = supplies::select('id', 'supply_name', 'supply_cod', 'supply_description', 'status')
            ->where('status', status::where('status_name', 'active')
            ->first()->id)
            ->get();

        $data = array();

        $movements = warehouse_movement::all();

        $teams = Teams::all();

        return view('admin.inventories.orders.create', compact('teams', 'movements', 'supplies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $team = $request->user()->id_team;
        
        $requestorder = RequestOrder::create([
            'id_applicant' => $request->user()->id,
            'id_team' => $request->user()->id_team,
            'status' => status::where('status_name', 'active')->first()->id,
        ]);

        foreach ($request->quantity as $key => $value)
        {
            if ($value != null)
            {
                $supplies = OrderSuppliesOrder::create([
                    'id_order' => $requestorder->id,
                    'id_supplies' => $key,
                    'quantity' => $value
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
        $order = RequestOrder::where('id', $id)->first();

        $order->delete();

        return redirect()->route('admin.inventories.suppliesorder.index');
    }
}
