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

            $carbon = Carbon::now();

            $date = $carbon->format('Ymd');

            $date = $date[4] + $date[5];

            $allUnits = BloodUnitReportModel::whereMonth('created_at', $date)->get();

            $acumulation = 0;

            foreach ($allUnits as $unit) {
                $acumulation += $unit->quantity;
            }

            $reports = [];

            foreach ($lastReports as $report) {

                $geo = json_decode($report->geolocation);
                $report->geolocation = $geo;
                $report->acumulation = $acumulation;
                array_push($reports, $report);
            }

            $lastReports = [
                "lastList" => $reports,
                "acumulation" => $acumulation,
            ];

            return $lastReports;
        } catch (Exception $e) {
            return $e;
        }
    }
}
