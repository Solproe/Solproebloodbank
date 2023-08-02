<?php

namespace App\Http\Livewire\Donors;

use App\Exports\PersonExport;
use App\Models\Donor\DonationType;
use App\Models\Donor\person;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class FilterReportController extends Component
{

    use withPagination;

    /* public $arrayTables = []; */

    public $reportElements = [
        'type_donor' => '',
        'fromdate' => '',
        'todate' => '',
        'listCheck' => [],
    ];

    public function generateReport()
    {

        return Excel::download(new PersonExport($this->reportElements), 'person.xlsx');
        /*   return Excel::download(new PersonExport(), 'personexport.xlsx'); */
        /* return Excel::download(new PersonExport(), 'PersonExport.xls'); */
    }

    /* public function ListCheckField()
    {
    $collection = collect([$this->arrayTables]);
    dd($collection);
    $multiplied = $collection->map(function ($item, $key) {
    return $item * 2;
    });

    $multiplied->all();

    // [2, 4, 6, 8, 10]
    } */
    public function render()
    {

        $donortypes = DonationType::all();
        $donoreports = person::where('ID_DONATIONTYPE', '!=', '')
            ->reportElement($this->reportElements)
            ->latest('DAT_ENTRY')
            ->paginate(25);

        $arrayTables = DB::select('describe person');
        /*  $dat_entry = $donoreports->DAT_ENTRY;
        $dat_register = Carbon::createFromFormat('Y-m-d h:i:s', $dat_entry)->format('d-m-Y');
         */
        return view('livewire.donors.filter-report-controller', compact('donoreports', 'donortypes', 'arrayTables', /* 'dat_register' */));
    }

}
