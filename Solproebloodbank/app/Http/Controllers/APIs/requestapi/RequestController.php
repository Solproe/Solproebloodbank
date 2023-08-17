<?php

namespace App\Http\Controllers\APIs\requestapi;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\status\status;
use App\Models\ValidateReceived\ValidateReceivedModel;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Nette\Utils\Arrays;

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

        if ($request->status == 'received')
        {
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
        $center = Center::all();

        $data = [];

        try
        {
            foreach ($center as $centre)
            {
                if (array_key_exists("bloodBankNames", $data))
                {
                    array_push($data["bloodBankNames"], $centre->des_centre);
                }
                else
                {
                    $data = ["bloodBankNames" => []];
                    array_push($data["bloodBankNames"], $centre->des_centre);
                }
            }
            $data = json_encode($data);
        }
        catch (Exception $e)
        {
            return $e;
        }

        return $data;
    }
}
