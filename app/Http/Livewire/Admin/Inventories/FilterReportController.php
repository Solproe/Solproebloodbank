<?php

namespace App\Http\Livewire\Admin\Inventories;

use App\Exports\ShippingExport;
use App\Models\Center;
use App\Models\delivery;
use App\Models\Inventories\delivery\validatereceived;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class FilterReportController extends Component
{

    use withPagination;

    /* public $arrayTables = []; */

    public $reportElementsShipping = [
        /*  'created_at' => '', */
        'center' => '',
        'id_status' => '',
        'through' => '',
        'fromdate' => '',
        'todate' => '',
        'listCheck' => [],
    ];

    /*  public function generateReportShipping()
    {

    } */

    public function pdf()
    {
        $title = [
            'title' => 'Report',
        ];
        $deliveries = delivery::all();
        $centres = Center::all();
        $deliveryreports = validatereceived::filterElement($this->reportElementsShipping)->paginate(10);
        $arrayTables = DB::select('describe validate_received');

        $pdf = PDF::loadView('admin.inventories.delivery.reports.shippingPDF', compact('deliveries', 'centres', 'deliveryreports', 'arrayTables'))->output();

        return response()->streamDownload(
            fn() => print($pdf),
            "ShippingReport-PDF.pdf"
        );

    }

    public function excel()
    {
        return Excel::download(new shippingExport($this->reportElementsShipping), 'shipping.xlsx');
    }

    public function render()
    {
        $deliveries = delivery::all();
        $centres = Center::all();
        $deliveryreports = validatereceived::filterElement($this->reportElementsShipping)->paginate(10);
        $arrayTables = DB::select('describe validate_received');

        return view('livewire.admin.inventories.filter-report-controller', compact('deliveries', 'centres', 'deliveryreports', 'arrayTables'));

    }

}
