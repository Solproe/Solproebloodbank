<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;
use App\Http\Middleware\data;
use App\Models\APIs\geocodingGoogleAPI;
use App\Models\APIs\tugps24API;
use App\Models\Data\validateDistance;
use App\Models\Requests\Requests;
use App\Models\Status\status;
use App\Services\FirebaseMessaging;
use App\Services\FirebaseRealTimeDatabase;
use App\Services\FirebaseService;
use Illuminate\Http\Request;

/**
 * @method static \Illuminate\Routing\RouteRegistrar middleware(array|string|null $middleware)
 */

class RequestController extends Controller
{

    public $typeRequest;

    public $details = [
        'patientName' => null,
        'identification' => null,
        'docType' => null,
        'gender' => null,
        'date' => null,
        'hour' => null,
        'from' => null,
        'to' => null,
    ];

    public $data;

    public function index() {

        $requests = Requests::all();

        return view('requests.index', compact('requests'));
    }

    public function create() {

        return view('requests.create');
    }

    /**
     * receive request to save and push messages
     */

    public function store(Request $request)
    {
        $requests = new Requests();

        $tuGPS24 = new tugps24API();

        $tuGPS24Ambulances = $tuGPS24->request();

        $geoCodingGoogleAPI = new geocodingGoogleAPI();

        $status = status::select('id')->where('name', 'sent')->first();

        $geoTo = $geoCodingGoogleAPI->getAddressGeocoding($request->to);

        $validateDistance = new validateDistance();

        $firebase = new FirebaseService(config('services.tugps24.db.solproe-solproyectar'));

        $database = new FirebaseRealTimeDatabase($firebase->getFirebase(), config('services.tugps24.db.solproe-solproyectar'));

        $message = new FirebaseMessaging($firebase->getFirebase(), config('services.tugps24.db.solproe-solproyectar'));

        if ($request->from == null && $request->transType == 'TAM')
        {

            $this->typeRequest = ':Urgency';

            $nearestDevice = $validateDistance->nearestDevice($tuGPS24Ambulances, $geoTo, $request->transType);

            $requests->id_ambulance = $nearestDevice->id;

            $requests->id_status = $status->id;

            $requests->type = $nearestDevice->type . $this->typeRequest;

            $nearestDevice->update((['id_status' => 7]));

            $requests->id_user = auth()->user()->id;

            $requests->address = $request->to;

            $this->details = [
                'patientName' => null,
                'identification' => null,
                'docType' => null,
                'gender' => null,
                'date' => null,
                'hour' => null,
                'from' => null,
                'to' => [
                    'lat' => strval($geoTo[0]),
                    'lng' => strval($geoTo[1]),
                ],
            ];

            $this->data = [
                'plate' => $nearestDevice->plate,
                'type'  => $nearestDevice->type . $this->typeRequest,
                'status' => $status->name,
                'operator' => auth()->user()->name,
                'address' => $request->to,
                'details' => $this->details,
            ];

            $database->saveRequest("requests", $this->data);

            $this->details = json_encode($this->details);

            $requests->details = $this->details;

            $requests->save();

            $message->send($requests);

            return redirect()->route('admin.requests.index');
        }
        elseif ($request->from != null && $request->transType == 'TAM')
        {
            $this->typeRequest = ':Normal';

            $geoFrom = $geoCodingGoogleAPI->getAddressGeocoding($request->from);

            $nearestDevice = $validateDistance->nearestDevice($tuGPS24Ambulances, $geoFrom, $request->transType);

            $requests->id_ambulance = $nearestDevice->id;

            $requests->id_status = $status->id;

            $requests->type = $nearestDevice->type . $this->typeRequest;

            $requests->id_user = auth()->user()->id;

            $requests->address = $request->from;

            $this->details = [
                'patientName' => $request->patientName,
                'identification' => $request->identification,
                'docType' => $request->docType,
                'gender' => $request->gender,
                'date' => $request->date,
                'hour' => $request->hour,
                'from' => [
                    'lat' => strval($geoFrom[0]),
                    'lng' => strval($geoFrom[1]),
                ],
                'to' => [
                    'lat' => strval($geoTo[0]),
                    'lng' => strval($geoTo[1]),
                ],
            ];

            $RTdatabase = new FirebaseRealTimeDatabase($firebase
                ->getFirebase(), config('services.tugps24.db.solproe-solproyectar'));

            $this->data = [
                    'plate' => $nearestDevice->plate,
                    'type'  => $nearestDevice->type . $this->typeRequest,
                    'status' => $status->name,
                    'operator' => auth()->user()->name,
                    'address' => $request->to,
                    'details' => $this->details,
                ];

            $message->send($requests);

            $nearestDevice->update((['id_status' => 7]));

            $RTdatabase->saveRequest("requests" ,$this->data);

            $this->details = json_encode($this->details);

            $requests->details = $this->details;

            $requests->save();

            return redirect()->route('admin.requests.index');
        }
        elseif ($request->from != null && $request->transType == 'TAB')
        {
            $this->typeRequest = ':Normal';

            $geoFrom = $geoCodingGoogleAPI->getAddressGeocoding($request->from);

            $nearestDevice = $validateDistance->nearestDevice($tuGPS24Ambulances, $geoFrom, $request->transType);

            $requests->id_ambulance = $nearestDevice->id;

            $requests->id_status = $status->id;

            $requests->type = $nearestDevice->type . $this->typeRequest;

            $requests->id_user = auth()->user()->id;

            $requests->address = $request->from;

            $this->details = [
                'patientName' => $request->patientName,
                'identification' => $request->identification,
                'docType' => $request->docType,
                'gender' => $request->gender,
                'date' => $request->date,
                'hour' => $request->hour,
                'from' => [
                    'lat' => $geoFrom[0],
                    'lng' => $geoFrom[1],
                ],
                'to' => [
                    'lat' => $geoTo[0],
                    'lng' => $geoTo[1],
                ],
            ];

            $this->details = json_encode($this->details);

            $requests->details = $this->details;

            $requests->save();

            return redirect()->route('admin.requests.index');
        }
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }

    public function status($id)
    {
        return view('api.tuGPS24Status');
    }
}
