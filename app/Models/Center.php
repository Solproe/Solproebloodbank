<?php

namespace App\Models;

use App\Models\ValidateReceived\ValidateReceivedModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;
    protected $table = 'centre';
    protected $fillabel = [
        'id_centre',
        'cod_centre',
        'des_centre',
    ];
    protected $primaryKey = 'ID_CENTRE';

    public function validateReceived()
    {
        return $this->hasMany(ValidateReceivedModel::class, 'ID_CENTRE');
    }

    public function usersValidationBloodBanks()
    {
        return $this->hasMany(usersValidationBloodBank::class, 'ID_CENTRE');
    }

}
