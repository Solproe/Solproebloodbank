<?php

namespace App\Http\Controllers\APIs\authentication;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\RecordingGetIn;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\usersValidationBloodBank;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class validateAppUsers extends Controller
{
    public function validateBloodBankUsers(Request $request)
    {
        $user = User::where(['email' => $request->email])->first();

        $validateUser = usersValidationBloodBank::where('id_user', $user->id)->first();

        $response = [];

        if (isset($user->email) and isset($request->password))
        {
            $credentials= $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) {

                $response = [
                    "logged" => true,
                    "bloodBank" => $validateUser->center->DES_CENTRE
                ];

                $recording = new RecordingGetIn();

                $recording->email = $request->email;

                $recording->save();
            }
            else
            {
                $response = ["logged" => false];
            }
        }
        else
        {
            if (isset($validateUser->id_centre))
            {
                $response = [
                    "logged" => true,
                    "bloodBank" => $validateUser->center->DES_CENTRE
                ];

                $recording = new RecordingGetIn();

                $recording->email = $request->email;

                $recording->save();
            }
            else
            {
                $response = ["logged" => false];
            }
        }

        $response = json_encode($response);

        return $response;
    }
}
