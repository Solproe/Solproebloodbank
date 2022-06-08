<?php

namespace App\Http\Livewire;

use App\Http\Requests\ConsultarDonante;
use Livewire\Component;

class ClickEvent extends Component
{
    public $message = '';
    public $r = 77026634;

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function render()
    {
        return view('livewire.click-event');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function callFunction()
    {


        // Crear un nuevo recurso cURL
        $ch = curl_init();

        // Configurar URL y otras opciones apropiadas
        $headers = array(
            'Content-Type:application/json',
            'Authorization: Basic YnNoZW1vY2VudHJvdmFsbGVkdXBhcjpwYXNzMjczKg=='
        );
        curl_setopt($ch, CURLOPT_URL, "https://apps.ins.gov.co/SiheviAPI/Donacion/ConsultaDonante?doc=");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        $respuesta = json_decode(curl_exec($ch));
        $info = curl_getinfo($ch);
        curl_close($ch);
        /*  // Capturar la URL y pasarla al navegador
       curl_exec($ch); */

        /*  // Cerrar el recurso cURL y liberar recursos del sistema
       curl_close($ch); */
        $this->message = "You clicked on button";
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
}
