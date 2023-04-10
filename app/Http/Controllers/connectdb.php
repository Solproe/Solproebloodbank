<?php

namespace App\Http\Controllers;

use mysql_connect;

use Illuminate\Http\Request;
use PDO;

class connectdb extends Controller
{
    public $ServerName = "181.48.196.50";

    public $NameDB = 'edelphyn';

    public $UserName = 'SOFY';

    public $Password = 'sofy123';

    public function __construct()
    {

        set_time_limit(30);
        // Creamos la conexión con MySQL
        $conexion = new PDO('mysql:host=181.48.196.50;dbname=edelphyn', 'SOFY', 'sofy123');

        // Revisamos la Conexión MySQL
        if ($conexion->connect_error) {
            return $conexion->connect_error;
        } else {
            // Enviamos un mensaje de conexión correcta
            echo "Conectado correctamente";
        }
    }
}
