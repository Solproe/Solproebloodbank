<?php

namespace app\Http\Controllers\admin\inventories\warehouses;

use App\Http\Controllers\Controller;
use App\Models\Inventories\Order\RequestOrder;
use App\Models\Inventories\Order\SuppliesOrder as OrderSuppliesOrder;
use App\Models\Inventories\storage\warehouse_movement;
use App\Models\Inventories\supplies\supplies;
use App\Models\status\status;
use App\Models\teams\Teams;
use Exception;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $order_requests = RequestOrder::all();
        } catch (Exception $e) {
            dd($e);
        }

        return view('admin.inventories.warehouses.index', compact('order_requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supplies = supplies::all();
        $orders = RequestOrder::all();
        $teams = Teams::all();
        $movements = warehouse_movement::all();
        return view('admin.inventories.warehouses.create', compact('supplies', 'orders', 'teams', 'movements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'groupFrom' => 'required',
            'order' => 'required',
            'groupTo' => 'required',
            'quantity' => 'required',
        ]);


        foreach ($request->quantity as $key => $value) {

            //output supply record

            $wOut = new warehouse_movement();

            $wOut->id_team = $request->groupFrom;

            $wOut->id_order = $request->order;

            $wOut->id_supply = intval($key);

            $wOut->movement_type = "out";

            $wOut->quantity = intval($value);

            $wOut->balance = 0;

            $wOut->save();

            //input supply record

            $wIn = new warehouse_movement();

            $wIn->id_team = $request->groupTo;

            $wIn->id_order = $request->order;

            $wIn->id_supply = intval($key);

            $wIn->movement_type = "in";

            $wIn->quantity = intval($value);

            $wIn->balance = 0;

            $wIn->save();

            $order = RequestOrder::where('id', $request->order);

            $order->update([
                'status' => status::where('status_name', 'done')->first()->id,
            ]);

            /*$wIn = warehouse_movement::create([
                'id_team' => $request->groupTo,
                'id_order' => $request->order,
                'id_supply' => $value,
                'movement_type' => 'in',
                'quantity' => intval($key),
                'balance' => 0,
            ]);*/
        }

        if (true) {
            return redirect()->route('admin.inventories.warehouses.index');
        } else {
            return redirect()->route('admin.providers.create');
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movement = warehouse_movement::where('id', $id)->first();

        $movement->delete();

        return redirect()->route('admin.inventories.warehouses.index');
    }

    public function process()
    {
        $supplies = supplies::all();
        $teams = Teams::all();
        $movements = warehouse_movement::all();
        return view('admin.inventories.warehouses.create', compact('supplies', 'order', 'movements'));
    }
}
