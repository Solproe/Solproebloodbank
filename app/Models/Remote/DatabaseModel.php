<?php

namespace App\Models\Remote;

use App\Models\Remote\ConsultRemoteFilter;
use App\Http\Controllers\Donor\ConsultFilter;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDO;

class DatabaseModel extends Model
{
    use HasFactory;

    public $pdo;

    #creamos la instancia de una conexion

    public function createConnection(String $ip, String $dbName, String $user, String $passwd)
    {
        try {
            $this->pdo = new PDO(
                'mysql:host=' . $ip . '; ' . 'dbname=' . $dbName . '; ' . 'charset=utf8',
                $user,
                $passwd
            );
        }
        catch (Exception $e) {
            return $e;
        }
        
    }

    #aqui nos conectamos con una base de datos remota

    public function requestPatientData($identification)
    {

        #usamos el builder query de laravel par la consulta remota

        try
        {
            $stmt = $this->pdo->query('SELECT person.ID_PERSON, person.DES_SURNAME1, person.DES_SURNAME2, person.DES_NAME1, DES_SURNAME, DES_NAME,
            person.DES_NAME2, person.COD_GENDER, person.COD_CIVILID, offer.ID_OFFER, offer.DAT_OFFER, offer.ID_DEFERREDREASON,
            person.COD_GROUP, person.COD_RH, offer.COD_DONATION, centre.DES_CENTRE
            FROM person INNER JOIN offer ON person.ID_PERSON = offer.ID_PERSON, centre
            WHERE person.COD_CIVILID ='. $identification .';');

            $data = $stmt->fetchAll(PDO::FETCH_OBJ);

            if ($data != null)
            {
                $consult = new ConsultRemoteFilter();

                $response = $consult->compareDate($data , $this->pdo);

                return $response;
            }
            else 
            {
                return false;
            }
        }
        catch (Exception $e)
        {
            //code
        }
    }
}
