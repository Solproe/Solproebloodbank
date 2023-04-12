<?php

namespace App\Http\Controllers\Donors;

use App\Http\Controllers\Controller;
use App\Models\Donor\Offer;
use Illuminate\Http\Request;

class DeferredDonors extends Controller
{
    public function searchDeferredDonorsByDate($startdate, $endingdate)
    {
        $deferred = Offer::where('ID_DEFERREDREASON', '!=', null)->whereDate('DAT_OFFER', '>=', $startdate)->whereDate('DAT_OFFER', '<=', $endingdate)->get();

        return $deferred;
    }

    public function searchDeferredDonorById($id)
    {
        $deferred = Offer::where('ID_PERSON', '=', $id)->first();

        return $deferred->deferredreason;
    }

    public function deferredReason($offer)
    {
        $deferred = $offer->deferredreason;

        return $deferred;
    }
}
