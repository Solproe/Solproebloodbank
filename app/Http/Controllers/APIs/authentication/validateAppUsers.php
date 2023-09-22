<?php

namespace App\Http\Controllers\APIs\authentication;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\RecordingGetIn;
use Illuminate\Http\Request;
use App\Models\usersValidationBloodBank;

class validateAppUsers extends Controller
{
    public function validateBloodBankUsers(Request $request)
    {
        $validateUser = usersValidationBloodBank::where(['email' => $request->email,
                                                        'phoneNumber' => $request->number])->first();

        $response = [];

        $recording = new RecordingGetIn();

        $recording->email = $request->email;

        $recording->phoneNumber = $request->number;

        $recording->save();

        if (isset($validateUser->email) && $validateUser->email != null)
        {
            $center = Center::where('id_centre', $validateUser->id_centre)->first();
            $response = ["validateRes" => true,
                        "bloodBank" => $center->DES_CENTRE];
            $response = json_encode($response);
            return $response;
        }
        else
        {
            $response = ["validateRes" => false,
                        "bloodBank" => strlen($request->number)];
            $response = json_encode($response);
            return $response;
        }
    }
}
