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
        return true;
    }

    public function store(Request $request)
    {
        return ["res" => "hi baby"];
    }

    public function update(Request $request, $id)
    {
        $validateReceived = ValidateReceivedModel::where('consecutive', $id)->first();

        $validateReceived->update(['news' => $request->getClientIp()]);

        $status = status::where('status_name', $request->status)->first();

        $carbon = Carbon::now('GMT-5');

        $res = ['status' => '200'];

        if ($request->status == 'received')
        {
            $res = ['status' => 'ok'];

            $res = json_encode($res);
            return $res;
        }
        elseif ($request->status == 'receivedAnnotation')
        {
            try
            {
                $validateReceived->update(['id_status' => $status->id,
                    'received_date' => strval($carbon),
                    'news' => $request->annotation]);
                $res = ['status' => 'ok'];
                $res = json_encode($res);

                return true;
            }
            catch (Exception $e)
            {
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
