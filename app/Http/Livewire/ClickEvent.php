<?php

namespace App\Http\Livewire;

use App\Http\Requests\ConsultarDonante;
use Livewire\Component;
use Illuminate\Http\Request;

class ClickEvent extends Component
{
    public $identification;
    public $documenttype;
    public $historico;
    protected $diferido;
    public $response_sihevi;
    public $recording;
    public $data;
    public $open = false;

    public function render()
    {
        $this->open = true;

        return view('livewire.click-event');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function VerConsulta(Request $id)
    {
        return view('consulta/Consulta');
    }

    private static function ConvertirFormatoFecha($fecha)
    {
        return substr($fecha, 6) . "-" . substr($fecha, 3, 2) . "-" . substr($fecha, 0, 2);
    }

    public function callFunction()
    {

        $ch = curl_init();
        $headers = array(
            'Content-Type:application/json',
            'Authorization: Basic YnNoZW1vY2VudHJvdmFsbGVkdXBhcjpwYXNzMjczKg=='
        );

        curl_setopt($ch, CURLOPT_URL, "https://apps.ins.gov.co/SiheviAPI/Donacion/ConsultaDonante?doc=" . $this->identification);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        $sihevi = json_decode(curl_exec($ch));
        $info = curl_getinfo($ch);
        curl_close($ch);

        $this->historico = $sihevi->HistoricoDonaciones;
        $this->diferido = $sihevi->InformacionDiferido;

        if ($this->historico == null) {

            $this->open = true;
        }

        $counter = 0;

        $last_date = "";

        $this->recording = null;

        foreach ($this->historico as $history) {

            if ($counter == 1) {

                $last_date = $history->FECHA_DONACION;
            } else {

                if (strtotime(date($this->ConvertirFormatoFecha($last_date))) > strtotime(date($history->FECHA_DONACION))) {

                    $this->recording = $counter;
                } else {

                    $last_date = $history->FECHA_DONACION;

                    $this->recording = $counter;
                }
            }

            if ($history->FECHA_DONACION == $last_date) {

                $this->data = (array) $history;
            }

            $counter += 1;
        }
    }
}
