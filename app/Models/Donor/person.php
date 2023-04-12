<?php

namespace App\Models\Donor;

use App\Models\Donor\Person as DonorPerson;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = 'person';

    protected $primaryKey = 'ID_PERSON';

    protected $fillable = [

        'ID_PERSON',
        'COD_DONOR',
        'COD_CIVILID',
        'DES_SURNAME',
        'DES_NAME',
        'COD_GENDER',
        'DES_ADDRESS',
        'DES_AREA',
        'ID_TOWN',
        'DES_TOWN',
        'ID_STATE',
        'COD_ACCEPTED',
        'DAT_DEFERRED',
        'COD_GROUP',
        'COD_RH',
        'DES_MOBILEPHONE',
        'ID_DEFERREDRASON',
        'DES_EMAIL',
        'ID_DEFERREDREASON',
        'TPDOC',
        'DES_NAME1',
        'DES_NAME2',
        'DES_SURNAME1',
        'DES_SURNAME2',
        'DAT_MODIFIED'
    ];

    public function deferredreason()
    {
        return $this->belongsTo(DeferredReason::class, 'ID_DEFERREDRASON');
    }

    public function donation()
    {
        return $this->hasMany(Donation::class, 'ID_DONATION');
    }
}
