<?php

namespace App\Http\Controllers\Donor;

use App\Http\Controllers\Controller;
use App\Models\Donor\Offer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nette\IOException;
use PhpParser\Node\Expr\Cast\Object_;

class ConsultFilter extends Controller
{

    public $data;

    public $deferred;

    public $donationData;

    private static function ConvertirFormatoFecha($fecha)
    {
        return substr($fecha, 0, 2) . substr($fecha, 2, 5) . substr($fecha, 5, 9);
    }

    public function compareDate(object $person)
    {
        $last_date = "";

        $counter = 0;

        #validamos que haya datos en la consulta $person

        /* dd($person); */

        if ($person != null) 
        {
            #iteramos para conocer el ultimo registro por fecha

            foreach ($person as $people) 
            {
                if ($counter == 0) 
                {
                    $last_date = $people->DAT_OFFER;
                } 
                else 
                {
                    if (strtotime(date($this->ConvertirFormatoFecha($last_date))) > strtotime(date($people->DAT_OFFER))) 
                    {
                        $this->data = $people;
                    } 
                    else 
                    {
                        $this->data = $people;

                        $last_date = $people->DAT_OFFER;
                    }
                }

                if (strtotime(date($this->ConvertirFormatoFecha($last_date))) <= strtotime(date($people->DAT_OFFER))) 
                {
                    $this->data = $people;
                }

                $counter += 1;
            }
           /*  Extract the date of the last offer with temporary deferral and converting dates */
           
            if ($this->data->ID_DEFERREDREASON != null) 
            {
                $this->deferred = Offer::where('offer.ID_OFFER', $this->data->ID_OFFER)
                    ->join('deferredreason', 'offer.ID_DEFERREDREASON', '=', 'deferredreason.ID_DEFERREDREASON')
                    ->select(
                        'deferredreason.COD_DEFERREDTYPE',
                        'deferredreason.DES_DEFERREDREASON',
                        'deferredreason.NUM_DEFERREDDAYS',
                        'offer.DAT_OFFER'
                    )
                    ->get();

                foreach ($this->deferred as $deferred) 
                {
                    if ($deferred->COD_DEFERREDTYPE == 'T') {
                        $carbon = new Carbon();
                        $fecha1 = $deferred->DAT_OFFER;
                        $fecha = Carbon::createFromFormat('Y-m-d h:i:s', $fecha1)->format('d-m-Y');
                        $date = Carbon::createFromFormat('d-m-Y', $fecha)->addDay($deferred->NUM_DEFERREDDAYS, 'day');
                        return [$this->data, $this->deferred, $date];
                    }
                }
                return [$this->data, $this->deferred];
            } 
            else 
            {
                $donation = DB::table('donation')
                    ->join('donationtype', 'donation.ID_DONATIONTYPE', '=', 'donationtype.ID_DONATIONTYPE')
                    ->where('donation.ID_PERSON', $this->data->ID_PERSON)
                    ->select('donation.COD_VALIDATED', 'donation.DAT_DONATION')
                    ->get();

                if ($donation != null)
                {
                    $last_date = "";

                    $counter = 0;

                    foreach ($donation as $donationRegister) 
                    {
                        if ($counter == 0) {

                            $last_date = $donationRegister->DAT_DONATION;
                        } else 
                        {
                            if (strtotime(date($this->ConvertirFormatoFecha($last_date))) > strtotime(date($donationRegister->DAT_DONATION))) 
                            {
                                $this->donationData = $donationRegister;
                            } 
                            else 
                            {
                                $this->donationData = $donationRegister;

                                $last_date = $donationRegister->DAT_DONATION;
                            }
                        }

                        if (strtotime(date($this->ConvertirFormatoFecha($last_date))) <= strtotime(date($donationRegister->DAT_DONATION))) 
                        {
                            $this->donationData = $donationRegister;
                        }

                        $counter += 1;
                    }
                    return [$this->data, $this->donationData];
                }
            }
            return [$this->data];

        } else {
            return [$this->data] = false;
        }
    }
}
