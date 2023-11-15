<?php

namespace App\Http\Controllers\APIs\authentication;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\RecordingGetIn;
use App\Models\Token;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\usersValidationBloodBank;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class validateAppUsers extends Controller
{

    use AuthenticatesUsers;

    public function isLogged(Request $request)
    {
        $response = [];
        
        if (isset(auth()->user()->email) and strtolower(auth()->user()->email) == strtolower($request->email))
        {
            $user = User::where("email", $request->email)->first();

            $validateUser = usersValidationBloodBank::where("id_user", $user->id)->first();

            $token = Token::where('name', $validateUser->center->COD_CENTRE)->first();

            $user1 = new User();

            $user1->email = $user->email;

            $user1->name = $user->name;

            $center = $validateUser->center;

            $center->token = $token->token;


            $response = [
                "logged" => true,
                "user" => $user1,
                "center" => $center,
            ];
        }
        else {
            $response = [
                "logged" => false];
            session()->flush();
        }

        $response = json_encode($response);
        return $response;
    }


    public function validateBloodBankUsers(Request $request)
    {
        $user = User::where(['email' => $request->email])->first();

        $validateUser = usersValidationBloodBank::where("id_user", $user->id)->first();

        $response = ["success"];

        if (isset($validateUser->id_user) and $validateUser->id_user != null)
        {
            if (isset($user->email) and isset($request->password))
            {
                $credentials = $request->validate([
                    'email' => ['required', 'email'],
                    'password' => ['required'],
                ]);
    
                if (Auth::attempt($credentials)) 
                {
                    $token = Token::where('name', $validateUser->center->COD_CENTRE)->first();
                    $validateUser->user->email = $request->email;
                    $validateUser->user->name = $user->name;

                    $center = $validateUser->center;
                    $center->town = $center->towns->name;
                    $center->token = $token->token;

                    $response = [
                        "success" => true,
                        "user" => $validateUser->user,
                        "center" => $validateUser->center,
                    ];

                    $request->session()->regenerate();
    
                    $recording = new RecordingGetIn();
    
                    $recording->email = $request->email;
    
                    $recording->save();
                }
                else
                {
                    $response = [
                        "success" => false,
                        "message" => "Invalid Credentials",
                    ];
                }
            }
            else
            {
                if (isset($validateUser->id_centre) and $validateUser->id_centre != null)
                {
                    $token = Token::where('name', $validateUser->center->COD_CENTRE)->first();
                    $center = $validateUser->center;
                    $center->token = $token->token;
                    $response = [
                        "success" => true,
                        "user" => $validateUser->user,
                        "center" => $center,
                    ];

                    $request->session()->regenerate();
    
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


    public function logOut(Request $request)
    {
        $user = new User();
        $user->email = $request->email;

        Auth::logout();

        $response = [
            "logOut" => true,
            "message" => "happen?",
        ];
        $response = json_encode($response);

        $request->flush();

        return $response;
    }
}
