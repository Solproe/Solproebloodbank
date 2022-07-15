<?php

namespace App\Http\Livewire;

use App\Http\Requests\ConsultarDonante;
use Livewire\Component;
use Illuminate\Http\Request;

class ClickEvent extends Component
{

    public $identification;
    public $documenttype;


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

    public function VerConsulta(Request $id)
    {
        return view('consulta/Consulta');
    }

    public function callFunction(Request $data)

    {
        gettype($data->all());
        /* $variables = $data->all(); */
        $id_var =  $data["serverMemo"];
        $datas = $id_var["data"];
        $documenttype = $datas["documenttype"];
        $identification = $datas["identification"];
        
       /*  @dd($documenttype); */
        /* $this->identification=$identification; */

        /*  $documenttype = "CC"; */
        /* $identification = "77026634";
 */
        /*  $url = 'www.your-domain.com/api.php?to=' . $mobile . '&text=' . $message; */


        $ch = curl_init();
        // Configurar URL y otras opciones apropiadas
        $headers = array(
            'Content-Type:application/json',
            'Authorization: Basic YnNoZW1vY2VudHJvdmFsbGVkdXBhcjpwYXNzMjczKg=='
        );
        curl_setopt($ch, CURLOPT_URL, "https://apps.ins.gov.co/SiheviAPI/Donacion/ConsultaDonante?doc="  .$identification . "&tipo_doc=" .$documenttype);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        $sihevi = json_decode(curl_exec($ch));
        @dd($sihevi);
        $info = curl_getinfo($ch);
        curl_close($ch);
    }
}
