<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use UserAccess;

class PhoneRegister extends Controller implements UserAccess
{
    public function validateUser($user, $password)
    {

    }

    public function registerPhone($user, $password, $token)
    {
        
    }

    public function userLogIn($user, $password, $token)
    {
        
    }

    public function register(Request $request)
    {
        $this->validate($request->name, $request->password, $request->token);
    }
}
