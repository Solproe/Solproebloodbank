<?php

namespace App\Services;

use App\Models\Requests\Requests;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

require '../vendor/autoload.php';


class FirebaseMessaging
{
    public $firebase;

    public $messaging;

    public function __construct(Factory $firebase)
    {
        $this->messaging = $firebase->createMessaging();
    }

    public function send(Requests $requests)
    {
        $message = CloudMessage::withTarget('Token', $requests->ambulances->device_token)
        ->withNotification(Notification::create($requests->type, $requests->address))
        ->withData(['salut' => 'hola']);

        $this->messaging->send($message);
    }
}
