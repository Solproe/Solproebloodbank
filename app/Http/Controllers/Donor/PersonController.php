<?php

namespace App\Http\Controllers\donor;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Donor\ConsultFilter;
use App\Models\Donor\person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $person = DB::table('person')
        ->join('offer', 'person.ID_PERSON', '=', 'offer.ID_PERSON')
        ->where('COD_CIVILID', '1006745229')
        ->select('person.ID_PERSON', 'person.DES_SURNAME1', 'person.DES_SURNAME2',
                'person.DES_NAME1', 'person.DES_NAME2','person.COD_GENDER',
                'person.COD_CIVILID', 'offer.ID_OFFER', 'offer.DAT_OFFER', 
                'offer.ID_DEFERREDREASON')->get();

        $consult = new ConsultFilter();

        $response = $consult->compareDate($person);

        return view('donor.donors.index', compact('response'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($identification)
    {
        $person = DB::table('person')
        ->join('offer', 'person.ID_PERSON', '=', 'offer.ID_PERSON')
        ->where('COD_CIVILID', $identification)
        ->select('person.ID_PERSON', 'person.DES_SURNAME1', 'person.DES_SURNAME2',
                'person.DES_NAME1', 'person.DES_NAME2','person.COD_GENDER',
                'person.COD_CIVILID', 'offer.ID_OFFER', 'offer.DAT_OFFER', 
                'offer.ID_DEFERREDREASON', 'person.COD_GROUP', 'person.COD_RH')->get();

        if ($person != null)
        {
            $consult = new ConsultFilter();

            $response = $consult->compareDate($person);
    
            return $response;
        }
        else 
        {
            return false;
        }
        
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
