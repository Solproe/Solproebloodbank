<?php

namespace App\Http\Controllers\APIs\authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\usersValidationBloodBank;

class validateAppUsers extends Controller
{
    public function validateBloodBankUsers(Request $request)
    {
        /*$validateUser = usersValidationBloodBank::where('email', "luisdanielcoronelposada903@gmail.com")->first();

        $response = [];

        if ($validateUser != null)
        {
            $response = ["data" => "null"];
            $response = json_encode($response);
            return $response;
        }
        else
        {
            $response = ["data" => "full"];
            $response = json_encode($response);
            return $response;
        }*/

        return true;
    }
}
