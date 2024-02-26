<?php

namespace app\Http\Controllers\admin\inventories\warehouses;

use App\Http\Controllers\Controller;
use App\Models\Inventories\Order\RequestOrder;
use App\Models\Inventories\Order\SuppliesOrder as OrderSuppliesOrder;
use App\Models\Inventories\storage\warehouse_movement;
use App\Models\Inventories\supplies\supplies;
use App\Models\teams\Teams;
use Exception;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try
        {
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
        $count = 0;
        $order = new RequestOrder();
        $order->id_applicant = auth()->user()->id;
        $order->status = 'earring';

        foreach ($request->supplies as $key => $value) {
            $suppliesOrder = new OrderSuppliesOrder();

            $suppliesOrder->id_supplies = $key;
            if ($value == null) {
                $supply = supplies::where('id', $key)->first();
                $message = "please specify quantity for: " . $supply->supply_name;
                $supplies = supplies::all();
                return view('admin.inventories.warehouses.create', compact('supplies', 'message'));
            } else {
                $suppliesOrder->quantity = $value;
                $order->save();
                $suppliesOrder->id_order = $order->id;
            }
            $suppliesOrder->save();
        }

        if ($suppliesOrder->save()) {
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
        //
    }
}
