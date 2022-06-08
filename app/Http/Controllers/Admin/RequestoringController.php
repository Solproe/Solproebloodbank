<?php

namespace App\Http\Controllers\Admin;

use App\Rule\uppercase;
use App\Http\Controllers\Controller;
use App\Models\regimen;
use App\Models\State;
use Illuminate\Http\Request;
use App\Models\Requestoring;
use App\Rules\UpperCase as RulesUpperCase;
use App\Models\town;
use App\Http\Livewire\ClickEvent;

class RequestoringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $requestorings = requestoring::all();
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
        $states = state::orderby('ID_STATE')->pluck('DES_STATE', 'ID_STATE');
        $towns = town::orderby('name')->pluck('name', 'id');
        $regimens = regimen::orderby('id')->pluck('name');
        $digits = ['0','1','2','3','4','5','6','7','8','9'];
        return view('admin.requestorings.create', compact('states', 'towns','regimens','digits'));
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
            'NIT' => 'required|unique:requestoring',
            'CHECK_DIGITAL' => 'required|unique:requestoring',
            'regimens' => 'required|unique:requestoring',
            'correo' => 'required|email|unique:requestoring',
            'DES_REQUESTORIG' => 'required',
            'Person_in_charge' => 'required',
            'CITIZENSHIP_CARD' => 'required',
            'LANDLINE' => 'required',
            'MOBILE' => 'required',
            'DES_STATE' => 'required',
            'DES_AREA' => 'required'

        ]);
        $states = State::all();
        $Requestoring = Requestoring::create($request->all());
        
        $this->towns = town::where('ID_STATE','ID_STATE')->get();
    
        return redirect()->route('admin.requestorings.edit', compact('requestoring', 'state'));
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
    public function edit(Requestoring $requestoring)
    {
        return view('admin.requestorings.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $requestorings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requestoring $requestorings)
    {
        //
    }
}
