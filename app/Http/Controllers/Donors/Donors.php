<?php

namespace App\Http\Controllers\Donors;

use App\Http\Controllers\Controller;
use App\Models\Donor\Donation as DonorDonation;
use App\Models\Donor\Person;
use Illuminate\Http\Request;

class Donors extends Controller
{
    public function searchRegularRepeatDonor($id)
    {
        $donation = DonorDonation::whereDate('ID_PERSON', '>=', '6000330')->orderBy('ID_DONATION', 'desc')->first();

        $newdate = intval(substr($donation->DAT_DONATION, 0, 4)) - 1;

        $newdate = str($newdate) . substr($donation->DAT_DONATION, 4);

        $num = 0;

        $donations = DonorDonation::whereDate('DAT_DONATION', '<=', $donation->DAT_DONATION)->whereDate('DAT_DONATION', '>=', $newdate)->where('ID_PERSON', '=', $id)->get();

        foreach ($donations as $data)
        {
            $num += 1;
        }

        if ($num >= 2) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }

    public function searchHabitualRepetitiveDonorByDate($startdate, $endingdate)
    {
        $donations = DonorDonation::whereDate('DAT_DONATION', '>=', $startdate)->whereDate('DAT_DONATION', '<=', $endingdate)->get();

        $habitualrepetitive = array();

        foreach ($donations as $donation) {
            $habitual = $this->searchRegularRepeatDonor($donation->ID_PERSON);

            if ($habitual == true) {
                $donor = Person::where('ID_PERSON', '=', $donation->ID_PERSON)->first();

                $habitualrepetitive[] = $donor;
            }
        }

        return $habitualrepetitive;
    }

    public function searchNewDonorsById($id)
    {
        $newdonor = $this->searchHabitualRepetitiveDonorById($id);

        if ($newdonor == true) 
        {
            return false;
        } 
        else 
        {
            return true;
        }
    }

    public function searchNewDonorsByDate($startdate, $endingdate)
    {
        $donations = DonorDonation::whereDate('DAT_DONATION', '>=', $startdate)->whereDate('DAT_DONATION', '<=', $endingdate)->get();

        $newdonors = array();

        foreach ($donations as $donation) 
        {
            $donor = $this->searchNewDonorsById($donation->ID_PERSON);

            if ($donor == true) 
            {
                $newdonor = Person::where('ID_PERSON', '=', $donation->ID_PERSON)->first();

                $newdonors[] = $donation;
            }

            return $newdonors;
        }
    }

    public function searchReplacementDonorsByDate($startdate, $endingdate)
    {
        $donations = DonorDonation::where("ID_DONATIONTYPE", '=', 2)->whereDate('DAT_DONATION', '>=', $startdate)->whereDate('DAT_DONATION', '<=', $endingdate)->get();

        $replacementdonors = array();

        foreach ($donations as $donation) 
        {
            $donor = Person::where('ID_PERSON', '=', $donation->ID_PERSON)->get();

            $replacementdonors[] = $donor;
        }

        return $replacementdonors;
    }
}
