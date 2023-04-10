<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\estado;
use App\Models\State;

class TownController extends Controller
{
    public function index()
    {
        $states = State::lists('name', 'state_id');
        return view('admin.providers.create');

    }

}
