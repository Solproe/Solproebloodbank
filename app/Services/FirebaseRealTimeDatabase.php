<?php

namespace App\Services;

use App\Http\Middleware\data;
use App\Models\Center;
use Exception;
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
        $center = Center::where('ID_CENTRE', $customer)->first();
        $customer = str_replace(" ", "", $center->des_centre);
        $this->reference = $this->database->getReference($ref)->getChild($customer);

        $date = substr($data->date, 0, 4) . "/" . substr($data->date, 5, 2) . "/" .
        substr($data->date, 8, 2) . " " . substr($data->date, 11, 5);

        dd($date);

        $json = [
            'consecutive' => $data->consecutive,
            'unities' => $data->unities,
            'boxes' => $data->boxes,
            'through' => $center->des_centre,
            'status' => $data->status->status_name,
            'date' => $date,
        ];

        try
        {
            $this->reference->set($json);
        }
        catch (Exception $e)
        {
            dd($e);
        }
    }

    public function updateTokens()
    {

    }
}
