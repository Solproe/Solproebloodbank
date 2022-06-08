<?php

namespace App\Http\Controllers\sihevi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function index()
    {
        return view('sihevi.consults.index');
    }

    public function edit($id)
    {
        return view('sihevi.consults.edit');
    }
}
