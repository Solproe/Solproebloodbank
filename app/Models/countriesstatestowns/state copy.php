<?php

namespace App\Models;

use App\Models\provider\Provider;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'countries';

    protected $fillabel = [
        'name_country',
        'id',
    ];

    protected $primaryKey = 'id';



    //Relacion uno a muchos

    public function towns()
    {
        return $this->hasMany(towns::class, 'ID_TOWN');
    }
}
