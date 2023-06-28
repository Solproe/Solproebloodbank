<?php

namespace App\Http\Controllers\Admin\appUsers;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\usersValidationBloodBank;
use Exception;
use Illuminate\Http\Request;

class AppUsersController extends Controller
{
    public function index()
    {
        $appUsers = usersValidationBloodBank::all();

        $centers = Center::all();

        return view('admin.appUsers.index', compact('appUsers', 'centers'));
    }

    public function create()
    {
        return view('admin.appUsers.create');
    }

    public function store(Request $request)
    {
        $validation = new usersValidationBloodBank();

        $validation->id_centre = $request->bloodBank;

        $validation->email = $request->email;

        $validation->phoneNumber = $request->phoneNumber;

        $validation->identification = $request->identification;

        try
        {
            $validation->save();

            return redirect()->route('admin.appUsers.index');
        }
        catch (Exception $e)
        {
            dd($e);
        }
    }

    public function edit()
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
