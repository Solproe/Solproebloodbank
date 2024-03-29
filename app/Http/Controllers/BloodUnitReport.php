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

    public function getLastReport()
    {
        try {
            $lastReport = BloodUnitReportModel::latest()
                ->take(3)
                ->get();

            return $lastReport;
        } catch (Exception $e) {
            return $e;
        }
    }
}
