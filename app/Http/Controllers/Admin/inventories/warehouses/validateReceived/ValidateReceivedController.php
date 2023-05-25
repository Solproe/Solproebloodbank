<?php

namespace App\Http\Controllers\Admin\inventories\warehouses\validateReceived;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\delivery;
use App\Models\status\status;
use App\Models\ValidateReceived\ValidateReceivedModel;
use App\Services\FirebaseMessaging;
use App\Services\FirebaseRealTimeDatabase;
use App\Services\FirebaseService;
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
        $validateReceived = ValidateReceivedModel::orderBy('id', 'DESC')->get();
        $now_date = Carbon::now()->addDay(1);
        $now_date = $now_date->toDateString();
        $date_delivery = Carbon::createFromFormat('Y-m-d', $now_date)->format('d-m-Y');

        $now_time = Carbon::now('GMT-5', 'Y-m-d H:m')->addHour(18);
        $now_time = $now_time->toTimeString();
        $time_delivery = $now_time;
        $centers = center::all();

        $deliverys = delivery::all();

        return view('validateReceived.index', compact('validateReceived', 'date_delivery', 'time_delivery', 'centers', 'deliverys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('validateReceived.create', compact('date_delivery', 'time_delivery'));
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
            'boxes' => 'required',
            'through' => 'required',
            'customer' => 'required',
        ]);

        $dateAndTime = $request->through;

        $dateAndTime = array_key_first($dateAndTime);

        $through = $request->through[$dateAndTime];

        $dateAndTime = explode(",", $dateAndTime);

        $date = explode("=>", $dateAndTime[0]);

        $date = $date[1];

        $time = explode("=>", $dateAndTime[1]);

        $time = $time[1];

        $firebase = new FirebaseService(config('services.tugps24.db.solproe-solproyectar'));

        $messaging = new FirebaseMessaging($firebase->getFirebase());

        $RTdatabase = new FirebaseRealTimeDatabase($firebase->getFirebase(), "https://solproe-solproyectar.firebaseio.com/");

        $validateReceived = new ValidateReceivedModel();

        $consecutive = $request->unities . $request->boxes . time() . date('DMY');

        $validateReceived->consecutive = $consecutive;

        $validateReceived->id_user = auth()->user()->id;

        $validateReceived->customer = $request->customer;

        $validateReceived->date = $date . " " . $time;

        $validateReceived->unities = intval($request->unities);

        $validateReceived->boxes = intval($request->boxes);

        $status = status::where('status_name', 'sent')->first();

        $validateReceived->id_status = $status->id;

        $validateReceived->through = $through;

        try
        {
            $validateReceived->save();

            $messaging->send($validateReceived);

            $RTdatabase->saveRequest("validateReceived", $validateReceived);
        } catch (Exception $e) {
            dd($e);
        }

        return redirect()->route('admin.validatereceived.index');

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
