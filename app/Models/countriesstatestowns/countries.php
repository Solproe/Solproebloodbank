<?php

namespace App\Models\countriesstatestowns;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class countries extends Model
{
    use HasFactory;

    public $fillable = [
        'id',
        'countryname',
    ];

    //Relacion uno a muchos

    public function states()
    {
        /*  return $this->belongsTo(estado::class); */
        return $this->hasMany(states::class, 'ID_STATE');
    }

}
