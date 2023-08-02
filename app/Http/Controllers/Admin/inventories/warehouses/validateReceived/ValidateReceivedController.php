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
use Illuminate\Support\Facades\DB;

class ValidateReceivedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $validateReceived = ValidateReceivedModel::orderBy('date', 'DESC')->get();

        $centers = Center::all();

        $duss = DB::select('describe delivery');

        $deliveries = delivery::all();

        return view('validateReceived.index', compact('validateReceived', 'centers', 'deliveries'));
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
            'date' => 'required',
            'time' => 'required',
            'customer' => 'required',
        ]);

        $delivery = delivery::where("id_delivery", $request->through)->first();
        $carbon = new Carbon();
        /*   $dateAndTime = Carbon::now("GMT-5", "Y-m-d H:m"); */
        $dateAndTime = $carbon->create($request->date . " " . $request->time . ":00");

        $dateAndTime = $dateAndTime->addHours(intval($delivery->time_delivery));

        $firebase = new FirebaseService(config('services.tugps24.db.solproe-solproyectar'));

        $messaging = new FirebaseMessaging($firebase->getFirebase());

        $RTdatabase = new FirebaseRealTimeDatabase($firebase->getFirebase(), "https://solproe-solproyectar.firebaseio.com/");

        $validateReceived = new ValidateReceivedModel();

        $consecutive = $request->unities . $request->boxes . time() . date('DMY');

        $validateReceived->consecutive = $consecutive;

        $validateReceived->id_user = auth()->user()->id;

        $validateReceived->customer = $request->customer;
        /*  dd($dateAndTime); */
        $validateReceived->date = $dateAndTime->toDateString() . " " . $dateAndTime->toTimeString();

        $validateReceived->unities = intval($request->unities);

        $validateReceived->boxes = intval($request->boxes);

        $status = status::where('status_name', 'sent')->first();

        $validateReceived->id_status = $status->id;

        $validateReceived->through = $request->through;

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
        $validateReceived = ValidateReceivedModel::where('id', $id)->first();

        $centers = Center::all();

        $duss = DB::select('describe delivery');

        $deliveries = delivery::all();
        return view('validateReceived.edit', compact('validateReceived', 'centers', 'deliveries'));
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

        $validateReceived = ValidateReceivedModel::where('id', $id)->first();

        $centers = Center::all();

        $duss = DB::select('describe delivery');

        $deliveries = delivery::all();
        dd($request);
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
