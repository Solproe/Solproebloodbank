<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\countriesstatestowns\states;
use App\Models\countriesstatestowns\Town;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    

    public function index()
    {
        $cities = Town::all();

        $states = states::all();

        return view('admin.towns.index', compact('cities', 'states'));
    }


    public function edit($id)
    {
        $city = Town::where('id', $id)->first();

        return view('admin.towns.edit', compact('city'));
    }


    public function store(Request $request)
    {
        $city = new Town($request->all());

        $city->save();

        return redirect()->route('admin.towns.index');
    }


    public function update(Request $request, $id)
    {
        //Update record
    }


    public function destroy($id)
    {
        $city = Town::where('id', $id)->first();

        $city->delete();

        return redirect()->route('admin.towns.index');
    }
}
