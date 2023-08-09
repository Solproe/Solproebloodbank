<?php

namespace App\Http\Controllers\admin\inventories\delivery;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\delivery;
use App\Models\Inventories\delivery\validatereceived;
use App\Models\status\status;
use App\Models\ValidateReceived\ValidateReceivedModel;
use App\Services\FirebaseMessaging;
use App\Services\FirebaseRealTimeDatabase;
use App\Services\FirebaseService;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ValidateRecivedController extends Controller
{
    public $search;
    public $sort = '';
    public $direction = 'desc';
    public $message = '';

    /* public function boot()
    {
    paginator::useBootstrap();
    } */

    public function index()
    {

        $validateReceived = validatereceived::orderBy('created_at', 'DESC')->paginate(8);
        /*   dd($validateReceived); */
        $centers = Center::all();
        /*   dd($centers); */
        $duss = DB::select('describe delivery');

        $deliveries = delivery::all();

        return view('admin.inventories.delivery.validateReceived.index', compact('validateReceived', 'centers', 'deliveries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        /* return view('validateReceived.create', compact('date_delivery', 'time_delivery')); */
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

        return redirect()->route('admin.inventories.delivery.validateReceived.index');
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

        $validateReceived = validatereceived::where('id', $id)->first();

        $centers = Center::all();
        $duss = DB::select('describe delivery');

        $deliveries = delivery::all();
        return view('admin.inventories.delivery.validateReceived.edit', compact('validateReceived', 'centers', 'deliveries'))->with('update', 'ok');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, validatereceived $validateReceived)
    {
        /*  $message = "";
        $validateReceived = validatereceived::all();

        $validateReceived->fill($request->all());
        $centers = Center::all();
        $deliveries = delivery::all(); */

        if (request('customer') != null) {

            $validateReceived->customer = request('customer');

            if (request('unities') != null) {
                $validateReceived->unities = request('unities');
            }
            if (request('boxes' != null)) {
                $validateReceived->boxes = request('boxes');
            }
            /*  dd($validateReceived->customer); */
        }
        if ($validateReceived->save()) {
            /*     dd($validateReceived)->save(); */
            return redirect()->route('admin.inventories.delivery.validateReceived.index')->with('update', 'ok');
        } else {
            return redirect()->route('admin.inventories.delivery.validateReceived.edit');
        }

    }

    public function destroy($id)
    {
        /*      dd($id); */
        /* $requestooring = Requestoring::where('ID_REQUESTORIG', $id);
        $requestooring->delete();

        $requestorings = Requestoring::all();
        $states = state::all();

        return view('admin.requestorings.index', compact('requestorings', 'states'));
         */

        $validateReceived = validatereceived::where('id', $id);
        $validateReceived->delete();

        return redirect()->route('admin.inventories.delivery.validateReceived.index')->with('delete', 'ok');
    }
}
