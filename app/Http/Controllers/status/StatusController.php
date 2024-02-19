<?php

namespace App\Http\Controllers\status;

use App\Http\Controllers\Controller;
use App\Models\status\status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    

    public function index()
    {
        $allStatus = status::all();

        return view('status.index', compact('allStatus'));
    }


    public function store(Request $request)
    {
        $status = new status();

        $status->status_name = $request->name;

        $status->save();

        return redirect()->route('status.index');
    }

    
    public function edit($id)
    {
        $status = status::where('id', $id)->first();

        return view('status.edit', compact('status'));
    }

    
    public function update(Request $request, $id)
    {
        $status = status::where('id', $id)->first();

        $status->name = $request->name;

        $status->save();

        return redirect()->route('status.index');
    }


    public function destroy($id)
    {
        $status = status::where('id', $id)->first();

        $status->delete();

        return redirect()->route('status.index');
    }
}
