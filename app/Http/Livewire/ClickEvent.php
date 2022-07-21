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
    
    public function render()
    {
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
        return substr($fecha, 0, 2) . "-" . substr($fecha, 3, 5) . substr($fecha, 6);
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
        $this->sihevi = json_decode(curl_exec($ch));
        $info = curl_getinfo($ch);
        curl_close($ch);

        $this->historico = $this->sihevi->HistoricoDonaciones;
        $this->diferido = $this->sihevi->InformacionDiferido;

        $counter = 1;

        $last_date = "";

        $recording = null;

        foreach ($this->historico as $history) {

            if ($counter == 1) {

                $last_date = $history->FECHA_DONACION;
            }
            else {

                if (strtotime($this->ConvertirFormatoFecha($last_date)) > strtotime($history->FECHA_DONACION)) {

                    $recording = $counter;
                }
                else {

                    $last_date = $history->FECHA_DONACION;
                    
                    $recording = $counter;
                }
            }

            $counter += 1;
        }

        $recording;

        $this->response_sihevi = $this->historico[intval($recording)];
    }
}
