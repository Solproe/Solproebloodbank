<?php

namespace App\Http\Controllers\admin\inventories\delivery;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\delivery;
use App\Models\Inventories\delivery\validatereceived;
use App\Models\status\status;
use App\Services\FirebaseMessaging;
use App\Services\FirebaseRealTimeDatabase;
use App\Services\FirebaseService;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ValidateReceivedController extends Controller
{

    public function index()
    {
        $validateReceived = validatereceived::orderBy('created_at', 'ASC')->paginate(8);
        $centers = Center::all();
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
        //
    }

    public function store(Request $request)
    {
        dd($request);
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
        /*  $date_created=$carbon->create($request->date); */
        $Time_created = $carbon->create($request->time_created . ":00");

        $firebase = new FirebaseService(config('services.tugps24.db.solproe-solproyectar'));
        $messaging = new FirebaseMessaging($firebase->getFirebase());
        $RTdatabase = new FirebaseRealTimeDatabase($firebase->getFirebase(), "https://solproe-solproyectar.firebaseio.com/");

        $validateReceived = new ValidateReceived();
        $consecutive = $request->unities . $request->boxes . time() . date('DMY');
        $validateReceived->consecutive = $consecutive;
        $validateReceived->id_user = auth()->user()->id;
        $validateReceived->customer = $request->customer;
        $validateReceived->time_created = $Time_created->toTimeString();
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

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $validateReceived = validatereceived::where('id', $id)->first();

        $centers = Center::all();

        $deliveries = delivery::all();

        return view('admin.inventories.delivery.validateReceived.edit', compact('validateReceived', 'centers', 'deliveries'))->with('update', 'ok');
    }

    public function update(Request $request, validatereceived $validateReceived)
    {
        $array = array();

            if (request('unities') != null) {
                $validateReceived->unities = request('unities');
            }

            if (request('boxes') != null) {
                $validateReceived->boxes = request('boxes');
            }

            if (request('customer') != null) {
                $validateReceived->customer = request('customer');
            }

            if (request('through') != null) {
                $validateReceived->through = request('through');
            }
        
        if ($validateReceived->update()) {
            return redirect()->route('admin.inventories.delivery.validateReceived.index')->with('update', 'ok');
        } else {
            return redirect()->route('admin.inventories.delivery.validateReceived.edit');
        }
    }

    public function destroy($id)
    {
        $validateReceived = validatereceived::where('id', $id);
        $validateReceived->delete();
        //

        return redirect()->route('admin.inventories.delivery.validateReceived.index')->with('delete', 'ok');
    }
}
