<?php

namespace App\Models\Remote;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PDO;

class ConsultRemoteFilter extends Model
{
    public $data;

    public $deferred;

    public $donationData;

    public static function ConvertirFormatoFecha($fecha)
    {
        return substr($fecha, 0, 2) . substr($fecha, 2, 5) . substr($fecha, 5, 9);
    }

    public function compareDate(array $person, PDO $pdo)
    {
        $last_date = "";

        $counter = 0;

        #validamos que haya datos en la consulta $person

        if ($person != null) {

            #iteramos para conocer el ultimo registro por fecha

            foreach ($person as $people) {
                if ($counter == 0) {

                    $last_date = $people->DAT_OFFER;
                } else {

                    if (strtotime(date($this->ConvertirFormatoFecha($last_date))) < strtotime(date($people->DAT_OFFER))) {

                        $this->data = $people;
                    } else {

                        $this->data = $people;

                        $last_date = $people->DAT_OFFER;
                    }
                }

                if (strtotime(date($this->ConvertirFormatoFecha($last_date))) <= strtotime(date($people->DAT_OFFER))) {

                    $this->data = $people;
                }

                $counter += 1;
            }

            if ($this->data->COD_DONATION != null) {
                $donation = $pdo->query('SELECT donation.COD_VALIDATED, donation.DAT_DONATION,
                            donationtype.DES_DONATIONTYPE FROM donation
                            INNER JOIN donationtype ON donation.ID_DONATIONTYPE = donationtype.ID_DONATIONTYPE
                            WHERE donation.COD_DONATION = ' . $this->data->COD_DONATION . ';');

                $data = $donation->fetchAll(PDO::FETCH_OBJ);
                return [[$this->data, $pdo], $data];
            }

            /*  Extract the date of the last offer with temporary deferral and converting dates */ 
            else {
                $this->deferred = $pdo->query('SELECT deferredreason.COD_DEFERREDTYPE, deferredreason.DES_DEFERREDREASON,
                        deferredreason.NUM_DEFERREDDAYS, offer.DAT_OFFER FROM deferredreason INNER JOIN offer ON 
                        offer.ID_DEFERREDREASON = deferredreason.ID_DEFERREDREASON WHERE offer.ID_OFFER =' . $this->data->ID_OFFER . ';');
                $data = $this->deferred->fetchAll(PDO::FETCH_OBJ);

                foreach ($data as $deferred)
                {
                    if ($deferred->COD_DEFERREDTYPE == "T") {
                        $carbon = new Carbon();
                        $fecha1 = $deferred->DAT_OFFER;
                        $fecha = Carbon::createFromFormat('Y-m-d h:i:s', $fecha1)->format('d-m-Y');
                        $date = (array) Carbon::createFromFormat('d-m-Y', $fecha)->addDay($deferred->NUM_DEFERREDDAYS, 'day');
                        return [[$this->data, $pdo], $data, $date];
                    }
                    else
                    {
                        return [[$this->data, $pdo], $data];
                    }
                }
            }
        } else {
            return [$this->data] = false;
        }
    }
}
