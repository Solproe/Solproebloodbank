<?php

namespace App\Http\Controllers\Donors;

use App\Http\Controllers\Controller;
use App\Models\Donor\Person;
use Illuminate\Http\Request;

class RejectedDonors extends Controller
{
    public function searchRejectedPermanentByDate($startdate, $endingdate)
    {
        $rejected = Person::whereDate('DAT_MODIFIED', '>=', $startdate)->whereDate('DAT_MODIFIED', '<=', $endingdate)->where('COD_ACCEPTED', '=', 'P')->get();

        return $rejected;
    }

    public function searchRejectedTemporaryByDate($startdate, $endingdate)
    {
        $rejected = Person::whereDate('DAT_MODIFIED', '>=', $startdate)->whereDate('DAT_MODIFIED', '<=', $endingdate)->where('COD_ACCEPTED', '=', 'T')->get();

        return $rejected;
    }
}
