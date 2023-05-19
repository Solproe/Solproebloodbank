<?php

namespace App\Http\Controllers\Admin\inventories\warehouses;

use App\Http\Controllers\Controller;
use App\Models\Inventories\Order\RequestOrder;
use App\Models\Inventories\Order\SuppliesOrder as OrderSuppliesOrder;
use App\Models\inventories\supplies\Order_Request;
use App\Models\Inventories\supplies\supplies;
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
        return view('admin.inventories.warehouses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $message = null;
        $supplies = supplies::all();
        return view('admin.inventories.warehouses.create', compact('supplies', 'message'));
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
