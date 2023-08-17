<?php

namespace App\Models;

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
    ];
    protected $primaryKey = 'ID_CENTRE';

    public function validateReceived()
    {
        return $this->hasMany(validatereceived::class, 'ID_CENTRE');
    }

    public function usersValidationBloodBanks()
    {
        return $this->hasMany(usersValidationBloodBank::class, 'ID_CENTRE');
    }

}
