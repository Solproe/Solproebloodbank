<?php

namespace App\Services;

use App\Http\Middleware\data;
use Kreait\Firebase\Database\Snapshot as DatabaseSnapshot;
use Kreait\Firebase\Factory;

require '../vendor/autoload.php';


class FirebaseRealTimeDatabase
{
    public $firebase;

    public $database;

    public $reference;

    public $data;

    public function __construct(Factory $firebase, $databaseName)
    {
        $this->firebase = $firebase->withDatabaseUri($databaseName);

        $this->database = $this->firebase->createDatabase();
    }

    public function getRequest($ref): DatabaseSnapshot
    {
        $this->reference = $this->database->getReference($ref);

        $this->data = $this->reference->getSnapshot();

        return $this->data;
    }

    public function saveRequest($ref, $data)
    {
        $customer = $data->customer;
        $customer = str_replace(" ", "", $customer);
        $this->reference = $this->database->getReference($ref)->getChild($customer);

        $date = substr($data->date, 0, 4) . "/" . substr($data->date, 5, 2) . "/" .
        substr($data->date, 8,2) . " " . substr($data->date, 11, 5);

        $json = [
            'consecutive' => $data->consecutive,
            'unities' => $data->unities,
            'boxes' => $data->boxes,
            'through' => $data->through,
            'status' => $data->status->status_name,
            'date' => $date,
        ];

        $this->reference->set($json);
    }

    public function updateTokens()
    {

    }
}
