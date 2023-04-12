<?php

namespace App\Http\Controllers\Donors;

use App\Http\Controllers\Controller;
use App\Models\Donor\Offer;
use Illuminate\Http\Request;

class PotentialDonors extends Controller
{
    public function __construct()
    {
        
    }

    public function searchoffer($startdate, $endingdate)
    {
        $offer = Offer::whereDate('DAT_OFFER', '>=', $startdate)->whereDate('DAT_OFFER', '<=', $endingdate)->get();

        return $offer;
    }
}
