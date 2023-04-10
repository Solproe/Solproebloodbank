<?php

namespace App\Models\ApiWhatsapp;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ApiWhatsapp\Token;

class VerifyWhatsapp extends Model
{
    public function phoneNumber($identification, $phoneNumber)
    {
        #consultamos el token de whatsapp para poder hacer la consulta

        $whatsappToken = Token::find(1);

        $ch = curl_init();
        $headers = array(
            'Content-Type:application/json',
            'Authorization: Bearer ' . $whatsappToken->whatsapp . ''
           
        );

        #estructuramos el cuerpo de la consulta

        $numberPhone = "57" . strval($phoneNumber);

        $body = [
            "messaging_product" => "whatsapp",
            "to" => $numberPhone,
            "type" => "template",
            "template" => [
                "name" => "check",
                "language" => [
                    "code" => "es"
                ]
            ]
        ];

        #hacemos la peticion a los servidores de whatsapp

        $notification = new NotificationWhatsapp();

        $notification->COD_CIVILID = $identification;

        $notification->phoneNumber = $numberPhone;

        $cuerpo = http_build_query($body);

        curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/v14.0/105793722275227/messages");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $cuerpo);
        $data = curl_exec($ch);
        curl_close($ch);

        #obtenemos la respuesta de la peticion

        $data = json_decode($data, true);

        
    }
}
