<?php

namespace App\Models\Remote;

use App\Models\Remote\ConsultRemoteFilter;
use App\Http\Controllers\Donor\ConsultFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDO;

class DatabaseModel extends Model
{
    use HasFactory;

    #aqui nos conectamos con una base de datos remota

    public function connectRemoteDatabase($identification)
    {

        $pdo = new PDO(
            'mysql:host=190.131.221.19; dbname=huav; charset=utf8',
            'lectura',
            'K!5sV&O47Q9k'
            /* 'mysql:host=181.48.196.50; dbname=banasa; charset=utf8',
            'solproe',
            'Zp16aX20%' */
        );

        #usamos el builder query de laravel par la consulta remota

        $stmt = $pdo->query('SELECT person.ID_PERSON, person.DES_SURNAME1, person.DES_SURNAME2, person.DES_NAME1, DES_SURNAME, DES_NAME,
                person.DES_NAME2, person.COD_GENDER, person.COD_CIVILID, offer.ID_OFFER, offer.DAT_OFFER, offer.ID_DEFERREDREASON,
                person.COD_GROUP, person.COD_RH, offer.COD_DONATION, center.DES_CENTER
                FROM person, centre INNER JOIN offer ON person.ID_PERSON = offer.ID_PERSON
                WHERE person.COD_CIVILID ='. $identification .';');

        $data = $stmt->fetchAll(PDO::FETCH_OBJ);

        if ($data != null)
        {
            $consult = new ConsultRemoteFilter();

            $response = $consult->compareDate($data , $pdo);
            return $response;
            
        }
        else 
        {
            return false;
        }

    }
}
