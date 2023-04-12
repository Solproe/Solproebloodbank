<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inventories\Requestoring;
use App\Models\Inventories\Town;
use App\Models\regimen;
use App\Models\state;
use Illuminate\Http\Request;

class RequestoringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('can:customers.index')->only('index');
        $this->middleware('can:customers.create')->only('create');
        $this->middleware('can:customers.edit')->only('edit', 'update');
        $this->middleware('can:customers.delete')->only('delete');
    }

    public function index()
    {
        $requestorings = Requestoring::all();
        $states = state::all();

        return view('admin.requestorings.index', compact('requestorings', 'states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Requestoring $requestorings)
    {
        /* $estados = estado::all()->sortBy('DES_STATE'); */
        $states = state::orderby('ID_STATE')->pluck('name', 'ID_STATE');
        $towns = Town::orderby('name')->pluck('name', 'ID_TOWN');
        $regimens = regimen::orderby('id_regimens')->pluck('name');
        $digits = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        /*  dd($states); */
        return view('admin.requestorings.create', compact('states', 'towns', 'regimens', 'digits'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        /*  $request->validate([

        'NIT' => 'required|unique:requestoring',
        'CHECK_DIGITAL' => 'required',
        'id_regimens' => 'required',
        'correo' => 'required',
        'DES_REQUESTORIG' => 'required',
        'DES_ADDRESS' => 'required',
        'persona_encargada' => 'required',
        'CITIZENSHIP_CARD' => 'required',
        'LANDLINE' => 'required',
        'MOBILE' => 'required',
        'ID_STATE' => 'required',
        'ID_TOWN' => 'required',

        ]); */
        /*  dd($request->ID_TOWN); */
        $states = State::all();
        $towns = Town::all();

        $Requestoring = new Requestoring();

        $Requestoring->NIT = $request->NIT;

        $Requestoring->CHECK_DIGITAL = $request->CHECK_DIGITAL;

        $Requestoring->id_regimens = $request->id_regimens;

        $Requestoring->correo = $request->correo;

        $Requestoring->DES_REQUESTORIG = $request->DES_REQUESTORIG;

        $Requestoring->DES_ADDRESS = $request->DES_ADDRESS;

        $Requestoring->persona_encargada = $request->persona_encargada;

        $Requestoring->CITIZENSHIP_CARD = $request->CITIZENSHIP_CARD;

        $Requestoring->LANDLINE = $request->LANDLINE;

        $Requestoring->MOBILE = $request->MOBILE;

        $Requestoring->ID_STATE = $request->ID_STATE;

        $Requestoring->ID_TOWN = $request->ID_TOWN;

        /*  $this->towns = town::where('ID_STATE','ID_STATE')->get(); */

        /* $requestooring = Requestoring::create($request->all()); */

        $Requestoring->save();

        return redirect()->route('admin.requestorings.index');
    }

    public function messages()
    {
        return [];

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Requestoring $requestoring)
    {
        return view('admin.requestorings.show', compact('requestoring'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requestoring = Requestoring::findOrFail($id);
        return view('admin.requestorings.edit', compact('requestoring'));
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
        $requestoring = Requestoring::findOrFail($id);
        $requestoring->fill($request->all());

        if ($requestoring->save()) {
            return redirect()->route('admin.requestorings.index');
        } else {
            return redirect()->route('admin.requestorings.edit');
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
        $requestooring = Requestoring::where('ID_REQUESTORIG', $id);
        $requestooring->delete();

        $requestorings = Requestoring::all();
        $states = state::all();

        return view('admin.requestorings.index', compact('requestorings', 'states'));

        /*  $requestorings->delete(); */
    }

    /* public function updateRequestorings(Request $request)
{

} */
}
