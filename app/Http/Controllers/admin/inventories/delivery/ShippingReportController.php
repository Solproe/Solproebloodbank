<?php

namespace App\Http\Controllers\admin\inventories\delivery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShippingReportController extends Controller
{
    public function export()
    {
        return view('admin.inventories.delivery.reports.exportshipping');
    }

    public function pdf()
    {
        return view('admin.inventories.delivery.reports.shippingPDF');
    }

    public function exportshippingPost(Request $request)
    {
        /* dd($request); */
        $validatereceiveds = DB::table('validate_received')
            ->select($request)
            ->get();
        return redirect()->route('inventories.delivery.reports.exportshipping');
    }

}
