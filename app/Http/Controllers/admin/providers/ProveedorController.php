<?php

namespace App\Http\Controllers\Admin\providers;

use App\Http\Controllers\Controller;
use App\Models\countriesstatestowns\states;
use App\Models\countriesstatestowns\Town as CountriesstatestownsTown;
use App\Models\provider\Provider;
use App\Models\regimen;
use App\Models\State;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:providers.index')->only('index');
        $this->middleware('can:providers.create')->only('create');
        $this->middleware('can:providers.create')->only('store');
        $this->middleware('can:providers.edit')->only('edit', 'update');
        $this->middleware('can:providers.delete')->only('destroy');
    }
    public $SelectedEstado = null, $selectedMunicipio = null;
    public $municipios = null;

    public function index()
    {
        $states = states::all();
        $towns = CountriesstatestownsTown::all();
        $providers = Provider::all();
        return view('admin.providers.index', compact('states', 'providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */

    public function create(Request $request)
    {
        $states = states::orderby('ID_STATE')->pluck('name', 'ID_STATE');
        $towns = CountriesstatestownsTown::orderby('name')->pluck('name', 'ID_TOWN');
        $regimens = regimen::orderby('id_regimens')->pluck('name');
        $digits = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        return view('admin.providers.create', compact('states', 'towns', 'regimens', 'digits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tax_identification' => 'required|unique:providers',
            'check_digital' => 'required',
            'id_regimens' => 'required',
            'ID_TOWN' => 'required',
            'name' => 'required',
            'legal_representative' => 'required',
            'CITIZENSHIP_CARD' => 'required',
            'ID_STATE' => 'required',
            'address' => 'required',
            'phones' => 'required',
            'LANDLINE' => 'required',
            'email' => 'required',
        ]);

        $providers = new Provider();
        $providers->fill($request->all());
        /*  dd($request->all()); */
        if ($providers->save()) {
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
    public function show(Provider $providers)
    {
        return view('admin.providers.show', compact('providers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provider = Provider::findOrFail($id);
        return view('admin.providers.edit', compact('provider'));
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

        $provider = Provider::findOrFail($id);
        $provider->fill($request->all());

        if ($provider->save()) {
            return redirect()->route('admin.providers.index');
        } else {
            return redirect()->route('admin.providers.edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provider = provider::where('id', $id);
        $provider->delete();

        $providers = Provider::all();
        $states = state::all();

        return view('admin.providers.index', compact('providers', 'states'));

    }

    public function nothing(Provider $providers)
    {
        return "nothing";
    }
}
