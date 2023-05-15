<?php

namespace App\Http\Controllers\APIs\googleapi;

use Kreait\Firebase\Factory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FirebaseFirestore extends Controller
{
    public function message(){
        $factory = (new Factory)
        ->withProjectId('my-project')
        ->withDatabaseUri('https://my-project.firebaseio.com');
    }
}
