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
            $report = new BloodUnitReportModel();

            $report->team_id = $request->id_team;

            $report->quantity = $request->quantity;

            $report->center_id = $request->idCenter;

            $report->save();

            return "ok";
        } catch (Exception $e) {
            return $e;
        }
    }

    public function getLastReport()
    {
        //code
    }
}
