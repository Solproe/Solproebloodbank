<?php

namespace App\Http\Controllers;

use App\Models\BloodUnitReportModel;
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

            $lastReports = BloodUnitReportModel::latest()
                ->take(3)
                ->where('team_id', $request->id_team)
                ->get();

            $lastReports = json_encode($lastReports);

            return $lastReports;
        } catch (Exception $e) {
            return $e;
        }
    }
}
