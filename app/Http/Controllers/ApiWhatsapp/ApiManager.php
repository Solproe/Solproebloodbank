<?php

namespace App\Http\Controllers\ApiWhatsapp;

use App\Http\Controllers\Controller;
use App\Models\ApiWhatsapp\NotificationWhatsapp;
use App\Models\ApiWhatsapp\VerifyWhatsapp;
use App\Models\sihevi\consult\Consult;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class ApiManager extends Controller
{
    #aqui aadministramos todos las peticiones referente a whatsapp

    public $from;

    public $status;

    #aqui enviamos una plantilla para el donante

    public function store(Request $request)
    {
        $verify = new VerifyWhatsapp();

        $data = $verify->phoneNumber($request->identification, $request->phonenumber);

        #redireccionamos la pagina a la consulta del donente

        return redirect()->route('sihevi.consults.index');
    }

    #receibimos la notificacion del estado del mensaje al donante

    public function notification(Request $request)
    {
        $request = (array) $request;

        $num = 0;

        #iteramos la respuesta y ubicamos el mensaje con el estado de la notificacion

        foreach ($request as $key => $value) {
            $value = $value;

            if ($num == 7) {
                $nuevoString = trim($value, "{ }");

                $arreglo = explode(",", $nuevoString);

                $nuevoString = trim($arreglo[0], "'");

                $nuevoString2 = trim($arreglo[1], "}");

                $arreglo = explode(":", $nuevoString);

                $this->from = trim($arreglo[2], "'{ '");

                $arreglo2 = explode(":", $nuevoString2);

                $this->status = $arreglo2[1];

                $notification = new NotificationWhatsapp();

                $notification->phonenumber = $this->from;

                $notification->status = $this->status;

                #consultamos los registros con ese numero telefono telefono

                $records = NotificationWhatsapp::where('phonenumber', '=', $this->from)
                    ->orderBy('id', 'DESC')
                    ->select('id', 'phonenumber', 'status')
                    ->take(1)
                    ->first();

                #validamos que existe algun registro con ese numero de telefono

                if ($records != null)
                {
                    if ($records->phonenumber == $this->from)
                    {
                        #validamos en caso de que exista algun registro con ese numero de telefono  

                        if ($records->status != 'read')
                        {
                            #actualizamos el registro en caso de que el estado  del numero de telefono se diferente de leido

                            try {
                                DB::table('notification_whatsapp')
                                ->where('id', (int) $records->id)
                                ->update(['status' => $this->status]);
    
                                $message = 'updated';
                            }
                            catch (Throwable $e) {

                                return $e;
                            }
                        }
                        else
                        {
                            #en caso de que el estado del numero de telefono sea leido creamos un nuevo registro

                            $notification->save();

                            $message = 'created';
                        }
                    }
                } else 
                {
                    $notification->save();

                    #retornamos la accion que se ejecuto dependiendo del estado previo del registro

                    $message = 'created';
                }

                return $message;
            }

            $num += 1;
        }
    }
}
