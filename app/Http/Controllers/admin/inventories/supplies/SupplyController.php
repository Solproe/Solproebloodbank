<?php
namespace App\Http\Controllers\admin\inventories\supplies;

use App\Http\Controllers\Controller;
use App\Models\Inventories\supplies\supplies;
use App\Models\process\step_process;
use App\Models\provider\Provider;
use App\Models\status\status;
use Illuminate\Http\Request;

class SupplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:inventories.index')->only('index');
        $this->middleware('can:invetories.create')->only('create');
        $this->middleware('can:inventories.edit')->only('edit', 'update');
        $this->middleware('can:inventories.delete')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplies = supplies::all();
        $status = status::all();
        return view('admin.inventories.supplies.index', compact('supplies', 'status'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = status::all();
        $providers = Provider::all();
        return view('admin.inventories.supplies.create', compact('status'));
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
            'supply_cod' => 'required|unique:supplies',
            'supply_name' => 'required|unique:supplies',
            'supply_description' => 'required',
            'status' => 'required',
        ]);

        $supplys = new supplies();
        $status = $request->status[0];
        $supplys->supply_cod = $request->supply_cod;
        $supplys->supply_name = $request->supply_name;
        $supplys->supply_description = $request->supply_description;
        $supplys->status = $status;
        $supplys->created_by = $request->user()->id;

        $supplys->save();

        return redirect()->route('admin.inventories.supplies.index');

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
        $supply = supplies::findOrFail($id);
        $status = status::all();

        return view('admin.inventories.supplies.edit', compact('supply', 'status'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $supply = supplies::findOrFail($id);
        /*  if (request('code') != null) {
        $supply->supply_cod = request('code');
        } */
        if (request('name') != null) {
            $supply->supply_name = request('name');
        }
        if (request('description') != null) {
            $supply->supply_description = request('description');
        }
        if (request('status') != null) {
            $supply->status = request('status');
        }
        $supply->save();
        return redirect()->route('admin.inventories.supplies.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(supplies $supply)
    {
        $supply->delete();
        return redirect()->route('admin.inventories.supplies.index');
    }
}
