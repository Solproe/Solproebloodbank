<?php

namespace App\Services;

require '../vendor/autoload.php';

use Kreait\Firebase\Factory;

class FirebaseService
{
    public $firebase;

    public function __construct($databaseName)
    {
        $this->firebase = (new Factory)
            ->withServiceAccount('../key/solproyectar-6f96d-firebase-adminsdk-n64ov-99c49e1e43.json');
    }

    public function getFirebase(): Factory
    {
        return $this->firebase;
    }
}
