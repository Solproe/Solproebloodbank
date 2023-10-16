<?php

namespace App\Http\Controllers\APIs\requestapi;

use App\Http\Controllers\Controller;
use App\Models\Remote\DatabaseModel;
use Illuminate\Http\Request;

class LocalDataController extends Controller
{
    
    public function getPatientData(Request $request)
    {

        $person = new DatabaseModel();

        $matriz = $person->connectRemoteDatabase($request->identification);
        
        $matriz = ["localData" => "data"];

        $matriz = json_encode($matriz);

        //error in formats

        return $matriz;
    }
}
