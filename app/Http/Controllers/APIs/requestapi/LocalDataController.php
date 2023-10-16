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

        if ($matriz != false)
        {
            $matriz = ["localData" => $matriz];
        }
        else 
        {
            $matriz = ["empty" => true];
        }

        $matriz = json_encode($matriz);

        //error in formats

        return $matriz;
    }
}
