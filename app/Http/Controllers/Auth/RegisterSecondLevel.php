<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\RoleAndPermission\Role;
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
        $roles = ModelsRole::all();
        return view('auth.register2', compact('roles'));
    }

    public function __construct()
    {
        /*   $this->middleware('can:register.users'); */
    }

    public function create(Request $input)
    {
        $name = $input->name;

        $email = $input->email;

        $role = $input->role;

        $validation =
            [
            'name' => $name,
            'email' => $email,
            'role' => $role,
        ];

        

        Validator::make($validation, [
            'name' => ['required', 'max:255'],
            'email' => ['required', '', 'email', 'max:255', 'unique:users'],
            'role' => ['required'],
        ])->validate();

        

        $role = Role::where('id', $input->role)->first();

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($input->password),
        ])->assignRole($role->name);

        return redirect()->route('dashboard');
    }
}
