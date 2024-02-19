<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\countriesstatestowns\countries;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    

    public function index()
    {
        $countries = countries::all();

        return view('admin.countries.index', compact('countries'));
    }


    public function store(Request $request)
    {
        $country = new countries();

        $country->countryname = $request->name;

        $country->code = $request->code;

        $country->save();

        return redirect()->route('admin.countries.index');
    }


    public function edit($id)
    {
        $country = countries::where('id', $id)->first();

        return view('admin.countries.edit', compact('country'));
    }


    public function update(Request $request, $id)
    {
        $country = countries::where('id', $id);

        $country->countryname = $request->name;
        
        $country->save();
    }


    public function destroy($id)
    {
        $country = countries::where('id', $id)->first();

        $country->delete();

        return redirect()->route('admin.countries.index');
    }
}
