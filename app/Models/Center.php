<?php

namespace App\Models;

use App\Models\countriesstatestowns\Town;
use App\Models\Inventories\delivery\validatereceived;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;

    protected $table = 'centre';

    protected $fillabel = [
        'ID_CENTRE',
        'COD_CENTRE',
        'DES_CENTRE',
        'TAX_IDENTIFICATION',
        'ADDRESS',
        'DOMAIN',
        'PUBLIC_IP',
        'DB_NAME',
        'DB_USER',
        'PASSWD',
        'town'
    ];

    protected $primaryKey = 'ID_CENTRE';

    protected $guarded = [];

    public function validateReceived()
    {
        return $this->hasMany(validatereceived::class, 'ID_CENTRE');
    }

    public function usersValidationBloodBank()
    {
        return $this->hasOne(usersValidationBloodBank::class, 'id', 'ID_CENTRE');
    }

    public function towns()
    {
        return $this->belongsTo(Town::class, 'town', 'ID_TOWN');
    }
}
