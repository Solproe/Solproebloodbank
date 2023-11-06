<?php

namespace App\Http\Controllers\APIs\authentication;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\RecordingGetIn;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\usersValidationBloodBank;
use Illuminate\Support\Facades\Auth;

class validateAppUsers extends Controller
{

    public function isLogged(Request $request)
    {
        $response = [];

        if ($this->middleware(['auth:sanctum']))
        {
            $response = ["logged" => true];
            $response = json_encode($response);
            return $response;
        }
        else {
            $response = ["logged" => false];
        }
    }

    public function validateBloodBankUsers(Request $request)
    {
        $user = User::where(['email' => $request->email])->first();

        $response = ["success"];

        if (isset($user->id) and $user->id != null)
        {
            $validateUser = usersValidationBloodBank::where('id_user', $user->id)->first();

            if (isset($user->email) and isset($request->password))
            {
                $credentials = $request->validate([
                    'email' => ['required', 'email'],
                    'password' => ['required'],
                ]);
    
                if (Auth::attempt($credentials)) 
                {
                    $user1 = new User();

                    $user1->email = $request->email;

                    $user1->password = $request->password;

                    $user1->name = $user->name;

                    $response = [
                        "success" => true,
                        "bloodBank" => $validateUser->center->DES_CENTRE,
                        "user" => $user,
                    ];

                    Auth::login($user1);
    
                    $recording = new RecordingGetIn();
    
                    $recording->email = $request->email;
    
                    $recording->save();
                }
                else
                {
                    $response = ["success" => false];
                }
            }
            else
            {
                if (isset($validateUser->id_centre))
                {
                    $response = [
                        "success" => true,
                        "bloodBank" => $validateUser->center->DES_CENTRE
                    ];
    
                    $recording = new RecordingGetIn();
    
                    $recording->email = $request->email;
    
                    $recording->save();
                }
                else
                {
                    $response = ["success" => false];
                }
            }
    
            $response = json_encode($response);
    
            return $response;
        }
        else
        {
            $response = [
                "logged" => false,
                "message" => "no exist user"
            ];

            $response = json_encode($response);

            return $response;
        }
    }
}
