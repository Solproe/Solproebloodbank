<?php

namespace App\Models\sihevi\consult;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Consult extends Model
{

    public $last_date;

    private static function ConvertirFormatoFecha($fecha)
    {
        return substr($fecha, 6) . "-" . substr($fecha, 3, 2) . "-" . substr($fecha, 0, 2);
    }

    public function compareDate($historicoModel, $genderModel, $insertionModel)
    {

        $last_date = "";

        $counter = 0;

        #itera el historico de donaciones para obtener el registro mas actual

        foreach ($historicoModel as $history) {

            #validamos que sea el primer registro
            if ($counter == 0) {

                $this->last_date = $history->FECHA_DONACION;

                $data = (array) $history;

            } else {

                #validamos que la fecha anterior sea mas mayor (mas reciente) que la nueva fecha

                if (strtotime($this->ConvertirFormatoFecha(date($history->FECHA_DONACION))) > strtotime(date($this->ConvertirFormatoFecha($this->last_date))))
                {
                    $data = (array) $history;

                    $this->last_date = $history->FECHA_DONACION;

                }
            }

            $counter += 1;
        }

        if ($historicoModel != null) {

            $openModel = 'no';

            $errorMessageModel = null;

            date_default_timezone_set('UTC');

            $dateNow = date("Y-m-d");

            $datetime2 = date_create($this->ConvertirFormatoFecha($this->last_date));
            $endDate = $datetime2->format('Y-m-d');

            $date = Carbon::createFromDate($datetime2);


            if ($genderModel == "M") {
                $endDate = $date->addMonths(3);
                if ($dateNow >= $endDate) {
                    $insertionModel = 'si';
                } else {
                    $insertionModel = 'no';
                    $errorMessageModel = 'El donante no esta habilitado por intervalo de tiempo';
                }
                $nextdate = $endDate->format('d-m-Y');
                $responseModel = strval($nextdate);
            } elseif ($genderModel == "F") {
                $endDate = $date->addMonths(4);
                if ($dateNow >= $endDate) {
                    $insertionModel = 'si';
                } else {
                    $insertionModel = 'no';
                    $errorMessageModel = 'El donante no esta habilitado por intervalo de tiempo';
                }
                $nextdate = $endDate->format('d/m/Y');
                $responseModel = strval($nextdate);
            } else {
                $responseModel = null;
            }
        } else {

            $errorMessageModel = "invalido";

            $openModel = 'si';
        }

        $array = [$data, $insertionModel, $openModel, $errorMessageModel, $responseModel];

        return $array;
    }
}
