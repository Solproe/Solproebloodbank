<?php

namespace App\Http\Controllers\APIs\requestapi;

use App\Http\Controllers\Controller;
use App\Models\status\status;
use App\Models\ValidateReceived\ValidateReceivedModel;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class RequestController extends Controller
{

    public function index()
    {
        $dus = "dus";
        return true;
    }

    public function store(Request $request)
    {
        return ["res" => "hi baby"];
    }

    public function update(Request $request, $id)
    {
        $validateReceived = ValidateReceivedModel::where('consecutive', $id)->first();

        $status = status::where('status_name', $request->status)->first();

        $date = Carbon::now('GMT-5', 'Y-m-d H:m');

        $res = ['status' => '200'];

        if ($request->status == 'received') {
            $validateReceived->update(['news' => json_encode($request->annotation),
                'received_date' => $date,
                'id_status' => $status->id,
                'sender' => $request->userName]);
            return $res;
        } elseif ($request->status == 'receivedAnnotation') {
            try
            {
                $validateReceived->update(['news' => json_encode($request->annotation),
                    'received_date' => $date,
                    'id_status' => $status->id,
                    'sender' => $request->userName]);

                return true;
            } catch (Exception $e) {
                $d = ["status" => "error"];
                $d = json_encode($d);

                return true;
            }
        }
    }

    public function show(Request $request)
    {
        $val = ['data' => 'daniel eres un pro!'];
        $val = json_encode($val);
        return $val;
    }
}
