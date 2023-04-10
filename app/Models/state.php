<?php

namespace App\Models;

use App\Models\provider\Provider;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';

    protected $fillabel = [
        'name',
        'ID_STATE',
    ];

    protected $primaryKey = 'ID_STATE';

    public function requestorings()
    {
        return $this->hasMany(Requestoring::class);
    }

    public function providers()
    {
        return $this->hasMany(Provider::class);
    }

    //Relacion uno a muchos

    public function towns()
    {
        /*  return $this->belongsTo(estado::class); */
        return $this->hasMany(towns::class, 'ID_TOWN');
    }
}
