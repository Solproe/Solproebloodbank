<?php

namespace App\Http\Controllers\Donors\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function export()
    {
        return view('donor.Reports.export');
    }

    public function import()
    {
        return view('donor.Reports.import');
    }

    public function modalvariable()
    {
        return view('donor.Reports.modalvariables');
    }

    public function exportPost(Request $request)
    {
        /* dd($request); */
        $person = DB::table('person')
            ->select($request)
            ->get();
        return redirect()->route('donor.Reports.export');
    }

}
