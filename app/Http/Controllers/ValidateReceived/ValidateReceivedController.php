<?php

namespace App\Http\Controllers\ValidateReceived;

use App\Http\Controllers\Controller;
use App\Models\ValidateReceived\ValidateReceivedModel;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class ValidateReceivedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $validateReceived = ValidateReceivedModel::all();

        foreach ($validateReceived as $validate)
        {
            if (strtotime(date(Carbon::now(env('TIMEZONE')))) < strtotime(date($validate->date)))
            {
                dd($validate->date);
            }
            else
            {
                dd(date(Carbon::now(env('TIMEZONE'))));
            }
        }

        return view('validateReceived.index', compact('validateReceived'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('validateReceived.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'unities' => 'required',
            'boxes'   => 'required',
            'minutesInterval' => 'required',
            'hour' => 'required',
            'date' => 'required',
            'through' => 'required',
        ]);

        $validateReceived = new ValidateReceivedModel();

        $consecutive = $request->unities.$request->boxes.time().date('DMY');

        $validateReceived->consecutive = $consecutive;

        $validateReceived->id_user = auth()->user()->id;

        $date = $request->date;

        $validateReceived->date = $date . " " . $request->hour;

        $validateReceived->hour = $request->hour;

        $validateReceived->interval = $request->minutesInterval;

        $validateReceived->unities = intval($request->unities);

        $validateReceived->boxes = intval($request->boxes);

        $validateReceived->id_status = 2;

        $validateReceived->through = $request->through;

        try
        {
            $validateReceived->save();
            return redirect()->route('admin.validatereceived.index');
        }
        catch (Exception $e)
        {
            dd($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $validateReceived = ValidateReceivedModel::where('id', $id)->first();

        $validateReceived->delete();

        return redirect()->route('admin.validatereceived.index');
    }
}
