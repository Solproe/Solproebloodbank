<?php

namespace App\Http\Controllers\APIs\authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\usersValidationBloodBank;

class validateAppUsers extends Controller
{
    public function validateBloodBankUsers(Request $request)
    {
        $validateUser = usersValidationBloodBank::where('email', $request->email)->first();

        $response = [];

        if (isset($validateUser->email) && $validateUser->email != null)
        {
            $response = ["res" => true];
            $response = json_encode($response);
            return $response;
        }
        else
        {
            $response = ["res" => false];
            $response = json_encode($response);
            return $response;
        }
    }
}
