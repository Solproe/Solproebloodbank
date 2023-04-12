<?php

namespace App\Http\Controllers\Admin\inventories\warehouses;

use App\Http\Controllers\Controller;
use App\Models\Inventories\Order\RequestOrder;
use App\Models\Inventories\Order\SuppliesOrder as OrderSuppliesOrder;
use App\Models\Inventories\supplies\supplies;
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
        $supplies = supplies::all();
        return view('admin.inventories.warehouses.index', compact('supplies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new RequestOrder();
        $order->id_applicant = auth()->user()->id;
        $order->status = 'earring';
        $order->save();

        foreach ($request->supplies as $key => $value) {
            $suppliesOrder = new OrderSuppliesOrder();
            $suppliesOrder->id_order = $order->id;
            $suppliesOrder->id_supplies = $key;
            $suppliesOrder->quantity = $value;
            $suppliesOrder->save();
        }

        if ($suppliesOrder->save()) {
            return redirect()->route('admin.providers.index');

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
