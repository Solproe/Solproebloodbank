<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;

class ExportController extends Controller
{
    public function reportPDF($query, $reportElementsShipping)
    {

        $query->when($reportElementsShipping['center'] ?? null, function ($query, $center) {
            $query->where('customer', $center);
        })->when($reportElementsShipping['through'] ?? null, function ($query, $through) {
            $query->where('through', $through);

        })->when($reportElements['fromdate'] ?? null, function ($query, $fromdate) {
            $query->where('created_to', '>=', $fromdate);

        })->when($reportElements['todate'] ?? null, function ($query, $todate) {
            $query->where('created_to', '<=', $todate);

        });

        $pdf = PDF::loadView('admin.inventories.delivery.reports.shippingPDF');
        return $pdf->stream('ShippingReport.pdf');
    }
}
