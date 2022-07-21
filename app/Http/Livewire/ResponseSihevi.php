<?php

namespace App\Http\Livewire;

use App\Http\Livewire\ClickEvent as LivewireClickEvent;
use Livewire\Component;
use Livewire\ClickEvent;
use Nette\Utils\Strings;

class ResponseSihevi extends Component
{

    /* public $open = true; */
    

    protected $listeners = ['donor' => 'callFunction'];

    public function render()
    {

        return view('livewire.response-sihevi');
    }

    public function callFunction(String $id)
    {

        $ch = curl_init();
        $headers = array(
            'Content-Type:application/json',
            'Authorization: Basic YnNoZW1vY2VudHJvdmFsbGVkdXBhcjpwYXNzMjczKg=='
        );

        curl_setopt($ch, CURLOPT_URL, "https://apps.ins.gov.co/SiheviAPI/Donacion/ConsultaDonante?doc=" . $id);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        $this->sihevi = json_decode(curl_exec($ch));
        $info = curl_getinfo($ch);
        curl_close($ch);

        $this->historico = $this->sihevi->HistoricoDonaciones;
        $this->diferido = $this->sihevi->InformacionDiferido;

        /* $this->open = true; */

    }
}
