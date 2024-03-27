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

            $report->team_id = 1;

            $report->quantity = 30;

            $report->center_id = 10;

            $report->save();
        } catch (Exception $e) {
            return $e;
        }
    }

    public function getLastReport()
    {
        //code
    }
}
