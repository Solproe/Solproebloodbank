<?php

namespace App\Http\Controllers\teams;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\teams\Teams;
use App\Models\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    //

    public function index()
    {
        $teams = Teams::all();

        return view('teams.index', compact('teams'));
    }


    public function store(Request $request)
    {
        $team = new Teams($request->all());

        $team->save();

        return redirect()->route('teams.index');
    }


    public function edit($id)
    {
        $team = Team::where('id', $id)->first();

        return view('teams.edit', compact('team'));
    }


    public function show($id)
    {
        $team = Team::where('id', $id)->first();

        $users = User::all();

        $team_users = User::where('id_team', $id)->get();

        return view('teams.show', compact('users', 'team', 'team_users'));
    }


    public function addUser(Request $request)
    {
        $data = $request->data;

        $user = User::where('id', $data[key($data)])->first();

        $user->update([
            "id_team" => key($data)
        ]);

        return redirect()->route('teams.show', key($data));
    }


    public function deleteUser(Request $request)
    {
        $data = $request->data;

        $user = User::where('id', $data[key($data)])->first();

        $user->update([
            'id_team' => null
        ]);

        return redirect()->route('teams.show', key($data));
    }
}
