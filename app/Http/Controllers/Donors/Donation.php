<?php

namespace App\Http\Controllers\Donors;

use App\Http\Controllers\Controller;
use App\Models\Donor\Donation as DonorDonation;
use App\Models\Donor\Person;
use Illuminate\Http\Request;

class Donation extends Controller
{
    public function searchDonationsByDate($startdate, $endingdate)
    {
        $donation = DonorDonation::whereDate('DAT_DONATION', '>=', $startdate)->whereDate('DAT_DONATION', '<=', $endingdate)->get();

        return $donation;
    }

    public function searchDonorLastDonationById($id)
    {
        $donation = DonorDonation::where('ID_PERSON', '=', $id)->orderBy('ID_DONATION', 'desc')->first();

        return $donation;
    }

    public function searchDonationTypeById($id)
    {
        $donor = DonorDonation::where('ID_DONATION', '=', $id)->orderBy('ID_DONATION', 'desc')->first();

        return $donor->donationtype;
    }
}
