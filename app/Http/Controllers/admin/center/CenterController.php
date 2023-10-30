<?php

namespace App\Http\Controllers\admin\center;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\countriesstatestowns\countries;
use App\Models\countriesstatestowns\states;
use Illuminate\Http\Request;

class CenterController extends Controller
{

    public $towns;
    public $states;
    public $digits;
    public $regimens;
    public $selectedState;
    public $selectedTown;

    public function index()
    {
        $centers = Center::all();
        $countries = countries::all();
        $states = states::all();
        return view('admin.centers.index', compact('centers', 'countries', 'states'));
    }

    public function create(Request $request)
    {
        $center = new Center();

    }

    public function store(Request $request)
    {
        $center = new Center();

        $center->TAX_IDENTIFICATION = $request->TAX_IDENTIFICATION;
        $center->COD_CENTRE = $request->COD_CENTRE;
        $center->DES_CENTRE = $request->DES_CENTRE;
        $center->TAX_IDENTIFICATION = $request->TAX_IDENTIFICATION;
        $center->ADDRESS = $request->ADDRESS;
        $center->PUBLIC_IP = $request->PUBLIC_IP;
        $center->DB_NAME = $request->DB_NAME;
        $center->DB_USER = $request->DB_USER;
        $center->PASSWD = $request->PASSWD;

        $center->save();
    }

    public function update(Request $request, $id)
    {
        $data = [];

        if (isset($request->DES_CENTRE) and $request->DES_CENTRE != null) {
            $data["DES_CENTRE"] = $request->DES_CENTRE;
        }
        if (isset($request->TAX_IDENTIFICATION) and $request->TAX_IDENTIFICATION != null) {
            $data["TAX_IDENTIFICATION"] = $request->TAX_IDENTIFICATION;
        }
        if (isset($request->COD_CENTRE) and $request->COD_CENTRE != null) {
            $data["COD_CENTRE"] = $request->COD_CENTRE;
        }
        if (isset($request->ADDRESS) and $request->ADDRESS != null) {
            $data["ADDRESS"] = $request->ADDRESS;
        }
        if (isset($request->PUBLIC_IP) and $request->PUBLIC_IP != null) {
            $data["PUBLIC_IP"] = $request->PUBLIC_IP;
        }
        if (isset($request->DB_NAME) and $request->DB_NAME != null) {
            $data["DB_NAME"] = $request->DB_NAME;
        }
        if (isset($request->DB_USER) and $request->DB_USER != null) {
            $data["DB_USER"] = $request->DB_USER;
        }
        if (isset($request->PASSWD) and $request->PASSWD != null) {
            $data["PASSWD"] = $request->PASSWD;
        }

        $center = Center::where('ID_CENTRE', $id)->first()
            ->update($data);

        return redirect()->route('admin.center.index');
    }

    public function destroy($id)
    {
        $center = Center::where('ID_CENTRE', $id);

        return redirect()->route('admin.center.index');
    }

    public function updatedselectedState()
    {
        $this->states = states::where('ID_STATE', $this->selectedState)->get();

    }
}
