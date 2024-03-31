<?php

namespace App\Http\Controllers;

use App\Models\BloodUnitReportModel;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class BloodUnitReport extends Controller
{


    public function saveReport(Request $request)
    {
        try {

            $geo = [
                "longitude" => $request->longitude,
                "latitude" => $request->latitude,
            ];

            $geo = json_encode($geo);

            return $geo;

            $report = BloodUnitReportModel::create([
                'geolocation' => $geo,
                'team_id' => $request->id_team,
                'quantity' => $request->quantity,
                'center_id' => $request->idCenter,
            ]);

            return 200;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function getLastReport(Request $request)
    {
        try {

            $date = Carbon::now();

            $date = $date->format('m');

            $lastReports = BloodUnitReportModel::latest()
                ->take(3)
                ->where('team_id', $request->id_team)
                ->whereMonth('created_at', $date)
                ->get();

            $lastReports = [
                "lastList" => $lastReports,
            ];

            $json = json_encode($lastReports);

            return $json;
        } catch (Exception $e) {
            return $e;
        }
    }
}
