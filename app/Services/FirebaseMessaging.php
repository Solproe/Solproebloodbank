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

    public function send(RequestInterface $requests)
    {
        $message = CloudMessage::withTarget('Topic', '')
        ->withNotification(Notification::create('Solproe', 'envio de productos'))
        ->withData(['consecutive' => $requests->consecutive]);

        $this->messaging->send($message);
    }
}
