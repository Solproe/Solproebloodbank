<?php

namespace App\Http\Controllers\Donors;

use App\Http\Controllers\Controller;
use App\Models\Donor\Person;
use Illuminate\Http\Request;

class AcceptedDonors extends Controller
{
    public function searchAcceptedDonorsByDate($startdate, $endingdate)
    {
        $accepted = Person::whereDate('DAT_MODIFIED', '>=', $startdate)->whereDate('DAT_MODIFIED', '<=', $endingdate)->where('COD_ACCEPTED', '=', 'A')->get();

        return $accepted;
    }
}
