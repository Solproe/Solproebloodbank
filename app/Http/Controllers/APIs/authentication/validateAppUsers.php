<?php

namespace App\Http\Controllers\APIs\authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\usersValidationBloodBank;

class validateAppUsers extends Controller
{
    public function validateBloodBankUsers(Request $request)
    {
        $number = substr($request->number, strlen($request->number), 10);

        $validateUser = usersValidationBloodBank::where([['email', '=', $request->email],
                                                        ['phoneNumber', '=', $number]])->first();

        $response = [];

        if (isset($validateUser->email) && $validateUser->email != null)
        {
            $response = ["validateRes" => true,
                        "bloodBank" => $validateUser->des_centre];
            $response = json_encode($response);
            return $response;
        }
        else
        {
            $response = ["validateRes" => false];
            $response = json_encode($response);
            return $response;
        }
    }
}
