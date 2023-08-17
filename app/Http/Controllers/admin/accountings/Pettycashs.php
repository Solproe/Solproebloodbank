<?php

namespace App\Http\Controllers\admin\accountings;

use App\Http\Controllers\Controller;
use App\Models\accountings\Accounting;
use App\Models\provider\Provider;
use Illuminate\Http\Request;

class Pettycashs extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dates = \Carbon\Carbon::now();
        return view('admin.accountings.pettycash.index', compact('dates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dates = \Carbon\Carbon::now();
        $date2 = $dates->format('dmY');
        $contar = 1;
        $consecutive = $contar++;
        $numeracion = ($date2 . $consecutive);
        $motions = ['Assets', 'Passives', 'Costs', '
        Bills', 'inventories'];
        $documents = ['Factura', 'Doc-soporte', 'Recibo-caja', '
        cta-cobro'];
        $providers = Provider::all();
        return view('admin.accountings.pettycash.create', compact('dates', 'numeracion', 'motions', 'documents', 'providers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* dd($request); */
        $request->validate([
            'date' => 'required',
            'number' => 'required|unique:pettycashs',
            'movement_type' => 'required',
            'document_type' => 'required',
            'providers' => 'required',
            'supply' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'cost_unit' => 'required',
        ]);

        $pettycashs = new Accounting();
        $pettycashs->fill($request->all());

        /* $pettycashs->date = $request->date;

        $pettycashs->number = $request->number;

        $pettycashs->movement_type = $request->movement_type; */

        if ($pettycashs->save()) {

            return redirect()->route('admin.accountings.pettycash.create');
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
