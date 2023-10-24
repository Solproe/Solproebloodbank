<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role as ModelsRole;

class RegisterSecondLevel extends Controller
{

    public function index()
    {
        $roleUser = ModelsRole::all();
        return view('auth.register', compact('roleUser'));
    }

    public function __construct()
    {
        /*   $this->middleware('can:register.users'); */
    }

    public function create(Request $input)
    {
        $name = $input->name;

        $email = $input->email;

        $roleUser = $input->roles;

        $validation =
            [
            'name' => $name,
            'email' => $email,
            'role' => $roleUser,
        ];

        Validator::make($validation, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required'],
        ])->validate();

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($input->password),
        ])->assignRole($roleUser);

        return redirect()->route('dashboard');
    }
}
