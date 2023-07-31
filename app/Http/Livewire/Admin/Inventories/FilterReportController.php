<?php

namespace App\Http\Livewire\Admin\Inventories;

use App\Exports\ShippingExport;
use App\Models\Center;
use App\Models\delivery;
use App\Models\Inventories\delivery\validatereceived;
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

    }
    public function excel()
    {
        return Excel::download(new shippingExport($this->reportElementsShipping), 'shipping.xlsx');
    }
    public function render()
    {
        $deliveries = delivery::all();
        $centres = Center::all();
        $deliveryreports = validatereceived::filterElement($this->reportElementsShipping)->
            /*  where('customer', '!=', '')
        ->reportElement($this->reportElementsShipping)
        ->latest('created_at') */
            paginate(10);
        $arrayTables = DB::select('describe validate_received');
        /*  $dat_entry = $donoreports->DAT_ENTRY;
        $dat_register = Carbon::createFromFormat('Y-m-d h:i:s', $dat_entry)->format('d-m-Y');
         */

        return view('livewire.admin.inventories.filter-report-controller', compact('deliveries', 'centres', 'deliveryreports', 'arrayTables'));

    }

}
