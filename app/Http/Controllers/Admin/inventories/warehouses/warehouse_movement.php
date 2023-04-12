<?php

namespace App\Http\Controllers\Admin\inventories\warehouse;

use App\Http\Controllers\Controller;
use App\Models\Inventories\Order\RequestOrder;
use App\Models\Inventories\Order\ShoppingOrder;
use App\Models\Inventories\Order\ShoppingSupplies;
use App\Models\Inventories\Order\SuppliesOrder;
use App\Models\Inventories\storage\warehouse_movement as StorageWarehouse_movement;
use App\Models\Inventories\supplies\supplies;
use Illuminate\Http\Request;

class warehouse_movement extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplies = supplies::all();

        $warehouse = StorageWarehouse_movement::all();

        return view('admin.inventories.warehouse.index', compact('warehouse', 'supplies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = RequestOrder::where('status', '=', 'pendiente')->get();

        $suppliesorder = SuppliesOrder::all();

        $supplies = supplies::all();

        $matriz = array();

        foreach ($suppliesorder as $supplyorder)
        {
            $warehouse = StorageWarehouse_movement::where('id_supply', '=', $supplyorder->id_supplies)->orderBy('id', 'desc')->first();

            if (isset($warehouse->id) && $warehouse->id != null && $supplyorder->supplies->status->status_name == 'active')
            {
                $matriz [] = [$supplyorder->supplies->supply_name => $warehouse->balance];
            }
            else
            {
                $matriz [] = [$supplyorder->supplies->supply_name => 0];
            }
        }

        return view('admin.inventories.warehouse.create', compact('suppliesorder', 'matriz', 'orders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = RequestOrder::find(key($request->to));

        $order->id = key($request->to);

        $order->status = 'procesado';

        $order->save();

        foreach ($request->quantity as $key => $value)
        {
            if ( $request->from != null)
            {
                $entity1 = StorageWarehouse_movement::where('entity', '=', $request->from)->where('id_supply', '=', $key)->orderBy('id', 'desc')->first();
            }

            $entity2 = StorageWarehouse_movement::where('entity', '=', $request->to[key($request->to)])->where('id_supply', '=', $key)->orderBy('id', 'desc')->first();

            $balance = 0;

            if ($value != null)
            {
                if ($request->to[key($request->to)] != 'principal')
                {
                    if (isset($entity2->balance) && $entity2->balance !== null)
                    {
                        $balance = $entity2->balance + intval($value);
                    } else 
                    {
                        $balance += intval($value);
                    }

                    $storage1 = new StorageWarehouse_movement();

                    $storage1->entity = $request->to[key($request->to)];

                    $storage1->id_order = key($request->to);

                    $storage1->id_supply = $key;

                    $storage1->movement_type = 'D';

                    $storage1->quantity = $value;

                    $storage1->balance = $balance;

                    $storage1->save();

                    $balance2 = 0;

                    if (isset($entity1->balance) && $entity1->balance != null)
                    {
                        $balance2 = $entity1->balance - intval($value);
                    } 
                    else 
                    {
                        $balance2 -= intval($value);
                    }

                    $storage2 = new StorageWarehouse_movement();

                    $storage2->entity = $request->from;

                    $storage2->id_order = key($request->to);

                    $storage2->id_supply = $key;

                    $storage2->movement_type = 'C';

                    $storage2->quantity = $value;

                    $storage2->balance = $balance2;

                    $storage2->save();
                } 
                else 
                {

                    $balance2 = 0;

                    if (isset($entity2->balance) && $entity2->balance !== null)
                    {
                        $balance2 = $entity2->balance + intval($value);
                    }  
                    else 
                    {
                        $balance2 += intval($value);
                    }

                    $storage3 = new StorageWarehouse_movement();

                    $storage3->entity = $request->to[key($request->to)];

                    $storage3->id_order = key($request->to);

                    $storage3->id_supply = $key;

                    $storage3->movement_type = 'D';

                    $storage3->quantity = $value;

                    $storage3->balance = $balance2;

                    $storage3->save();

                   
                }
            }

            $balance = 0;

            $balance2 = 0;
        }

        return redirect()->route('admin.warehouse.transfer.index');
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
        $order = RequestOrder::where('id', '=', $id)->first();

        $supplyorder = SuppliesOrder::where('id_order', '=', $order->id)->get();

        foreach ($supplyorder as $supply)
        {
            $balance = StorageWarehouse_movement::where('id_supply', '=', $supply->id_supplies)->orderBy('id', 'desc')->first();

            if ($balance != null)
            {
                $price [] = [$supply->id_supplies => $balance->balance];
            }
            else
            {
                $price [] = [$supply->id_supplies => 0];
            }
        }

        return view('admin.inventories.warehouse.edit', compact('order', 'supplyorder', 'price'));
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
