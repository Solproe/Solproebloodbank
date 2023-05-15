<?php

namespace App\Http\Controllers\APIs\requestapi;

use App\Http\Controllers\Controller;
use App\Models\status\status;
use App\Models\ValidateReceived\ValidateReceivedModel;
use Carbon\Carbon;
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
        $validateReceived = ValidateReceivedModel::where('consecutive', $request->consecutive)->first();

        $status = status::where('status_name', $request->status)->first();

        $carbon = Carbon::now(env('TIMEZONE'));

        $res = ['status' => '200'];

        if ($request->status == 'received')
        {

            $res = ['status' => 'ok'];

            $res = json_encode($res);
            return $res;
        }
        elseif ($request->status == 'receivedAnnotation')
        {
            $validateReceived->update(['id_status' => $status->id,
                                        'received_date' => $carbon,
                                        'news' => $request->annotation]);

            $res = ['status' => 'ok'];

            $res = json_encode($res);
            return $res;
        }

        return $res;
    }

    public function show(Request $request)
    {
        $val = ['data' => 'data'];
        $val = json_encode($val);
        return $val;
    }
}
