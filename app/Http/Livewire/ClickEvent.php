<?php

namespace App\Http\Livewire;

use App\Models\Center;
use App\Models\Remote\DatabaseModel;
use App\Models\sihevi\consult\Consult;
use Illuminate\Support\Carbon;
use Livewire\Component;
use PDO;

class ClickEvent extends Component
{
    public $identification;
    public $documenttype;
    public $historico;
    public $response;
    public $open;
    public $data;
    public $gender;
    public $insertion = null;
    public $errorMessage;
    public $diferido;
    public $weight;
    public $size;
    public $hemoglobin;
    public $phonenumber;
    public $localDataDonor;
    public $localBloodBank;
    public $localDeferredDonor;
    public $localDonationDonor;
    public $status;
    public $date;
    public $nextdonationdate;
    public $donationtype;
    public $band_consult;
    public $today;
    public $sihevidate;
    public $sihevinextdate;

    public function render()
    {
        return view('livewire.click-event');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function nextDonationDate($localdate, $sihevidate, $gender)
    {
        if (strtotime($localdate) < strtotime($sihevidate)) {
            $this->nextdonationdate = $sihevidate;
        } else {
            $this->nextdonationdate = $localdate;
        }

        if ($this->localDataDonor['COD_GENDER'] == 'F') {
            $this->nextdonationdate = Carbon::createFromFormat('d-m-Y', $this->date)->addMonths(4)->format('d-m-Y');

            $this->nextdonationdate = (array) $this->nextdonationdate;
            $this->nextdonationdate = $this->nextdonationdate[0];

            if (strtotime($this->nextdonationdate) <= $this->today) {
                $this->status = ['Aceptado'];
            } else {
                $this->status = ['Rechazado', 'Outside the donation range'];
            }
        } elseif ($this->localDataDonor['COD_GENDER'] == 'M') {
            $this->nextdonationdate = Carbon::createFromFormat('d-m-Y', $this->date)->addMonths(3)->format('d-m-Y');

            $this->nextdonationdate = (array) $this->nextdonationdate;
            $this->nextdonationdate = $this->nextdonationdate[0];

            if (strtotime($this->nextdonationdate) <= $this->today) {
                $this->status = ['Aceptado'];
            } else {
                $this->status = ['Rechazado', 'Outside the donation range'];
            }
        }
    }

    public function callFunction()
    {

        #damos valores por defecto o reseteamos los valores

        $this->insertion = 'no';

        $this->reset(['open']);
        $this->reset(['localDataDonor']);
        $this->reset(['localBloodBank']);
        $this->reset(['localDeferredDonor']);
        $this->reset(['localDonationDonor']);
        $this->reset(['status']);
        $this->reset(['date']);
        $this->reset('data');
        $this->reset('donationtype');
        $this->reset('gender');
        $this->reset('size');
        $this->reset('weight');

        #iniciamos la instancia para hacer la consulta post

        $ch = curl_init();
        $headers = array(
            'Content-Type:application/json',
            'Authorization: Basic YnNuYWNpb25hbHNhczk6cGFzczM2Nyo=',
        );

        curl_setopt($ch, CURLOPT_URL, "https://apps.ins.gov.co/SiheviAPI/Donacion/ConsultaDonante?doc=" . $this->identification
            . '&tipo_doc=' . $this->documenttype);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        $sihevi = json_decode(curl_exec($ch));
        $info = curl_getinfo($ch);
        curl_close($ch);

        if (isset($sihevi->HistoricoDonaciones) and $sihevi->HistoricoDonaciones != null) {
            $this->historico = $sihevi->HistoricoDonaciones;
        }

        if (isset($sihevi->InformacionDiferimientoTemporal) && $sihevi->InformacionDiferimientoTemporal->NUM_IDENTIFICACION != null)
        {
            
        }

        if (isset($sihevi->InformacionDiferido) and $sihevi->InformacionDiferido != null) {
            $this->diferido = (array) $sihevi->InformacionDiferido;
        }

        
        /*   dd($sihevi); */

        $person = new DatabaseModel();

        $center = Center::where("ID_CENTRE", "=", 5)->first();

        $person->createConnection($center->PUBLIC_IP, $center->DB_NAME, $center->DB_USER, $center->PASSWD);

        $matriz = $person->requestPatientData($this->identification);

        $this->today = (array) Carbon::now();

        $this->today = $this->today["date"];

        #validamos que haya registros en la base de datos local

        if (isset($matriz[0]) && $matriz[0] != false) {
            $this->localDataDonor = (array) $matriz[0];
            $this->localDataDonor = (array) $this->localDataDonor[0];
            $pdo = $matriz[0][1];
            $stmt = $pdo->query('SELECT DES_CENTRE FROM CENTRE;');
            $this->localBloodBank = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
            $this->localBloodBank = (array) $this->localBloodBank[0];
        } else {
            $this->status = ['Aceptado'];
        }

        if (isset($matriz[1][0]->COD_DEFERREDTYPE)) {

            $this->status = ['Rechazado', $matriz[1][0]->DES_DEFERREDREASON];
            $this->date = $this->localDataDonor['DAT_OFFER'];
            if (isset($matriz[2])) {
                $this->localDeferredDonor = [$matriz[1][0]->COD_DEFERREDTYPE, $matriz[2]['date']];
                $this->date = $this->localDataDonor['DAT_OFFER'];
            }
        } elseif (isset($matriz[1][0]->COD_VALIDATED)) {

            if ($matriz[1][0]->COD_VALIDATED == 'A') {

                $this->donationtype = (array) $matriz[1];
                $this->donationtype = (array) $this->donationtype[0];
                $this->status = ['Aceptado'];
                $this->date = $this->donationtype['DAT_DONATION'];
                $this->nextdonationdate = $this->date;
                $this->date = Carbon::createFromFormat('Y-m-d h:i:s', $this->date)->format('d-m-Y');

                /*  dd($nextdonationdate); */
            } else {
                $this->status = ['Rechazado'];
                $this->localDonationDonor = (array) $matriz[1];
                $this->localDonationDonor = (array) $this->localDonationDonor[0];
                $this->date = $this->localDonationDonor['DAT_DONATION'];
            }
        }

        #validamos que sihevi responda con registros del donante

        if ($this->historico != null) {

            #enviamos los datos al modelo y luego mostrarlos en la vista show answer

            $consult = new Consult();

            $array = $consult->compareDate($this->historico, $this->gender, $this->insertion);

            #obtenemos losa valores para cada propiedad que seran validadas en la vista

            $this->data = $array[0];

            $this->sihevidate = substr($this->data['FECHA_DONACION'], 6, 9) . '-' . substr($this->data['FECHA_DONACION'], 3, 2) . '-' . substr($this->data['FECHA_DONACION'], 0, 2);

            $this->sihevinextdate[0] = Carbon::createFromFormat('Y-m-d', $this->sihevidate)->addMonths(3)->format('Y-m-d');

            $this->sihevinextdate[1] = Carbon::createFromFormat('Y-m-d', $this->sihevidate)->addMonths(4)->format('Y-m-d');

            if ($this->data['TIPO_DONANTE'] == 'Aceptado' or $this->data['TIPO_DONANTE'] == null) {

                if ($this->data['CAUSA_DIFERIMIENTO'] == 'No aplica' and $this->status[0] == 'Aceptado') {
                    $this->status = ['Aceptado'];
                }
            }

            /* $this->insertion = $array[1]; */

            $this->open = $array[2];

            $this->errorMessage = $array[3];

            $this->response = $array[4];

            #validamos que si hay un diferimiento

            if ($this->diferido['NUM_IDENTIFICACION'] != null) {

                $this->insertion = 'no';

                $this->errorMessage = "Refer to the blood bank";
            } else {
                $this->nextdonationdate = '123';
            }

        } else {

            if ($this->status[0] == 'Aceptado' or $this->status == null) {
                $this->status = ['Aceptado'];
            }

            $this->band_consult = '1';
        }
    }
}
