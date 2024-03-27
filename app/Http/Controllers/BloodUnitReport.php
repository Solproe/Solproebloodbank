<?php

namespace App\Http\Controllers;

use App\Models\BloodUnitReportModel;
use Illuminate\Http\Request;

class BloodUnitReport extends Controller
{


    public function saveReport(Request $request)
    {
        $report = new BloodUnitReportModel();

        $report->team_id = 1;

        $report->quantity = 30;

        $report->center_id = 1;
    }

    public function getLastReport()
    {
        //code
    }
}
