<?php

namespace App\Http\Controllers\APIs\requestapi;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\Remote\DatabaseModel;
use Illuminate\Http\Request;

class LocalDataController extends Controller
{
    
    public function getPatientData(Request $request)
    {

        $databaseModel = new DatabaseModel();

        $center = Center::where('COD_CENTRE', $request->codCenter)->first();

        $databaseModel->createConnection($center->PUBLIC_IP, $center->DB_NAME, $center->DB_USER,
            $center->PASSWD);

        $matriz = $databaseModel->requestPatientData($request->identification);

        if ($matriz != false)
        {
            $matriz = ["localData" => $matriz];
        }
        else 
        {
            $matriz = ["empty" => true, "request" => $request->codCenter];
        }

        $matriz = json_encode($matriz);

        //error in formats

        return $matriz;
    }
}
