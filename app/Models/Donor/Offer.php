<?php

namespace App\Models\Donor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $table = 'offer';

    protected $primaryKey = 'ID_OFFER';

    protected $fillable = [

        'ID_OFFER',
        'COD_OFFER',
        'DAT_OFFER',
        'TIM_OFFER',
        'ID_USR',
        'ID_PATIENT',
        'ID_COLLECSITE',
        'ID_DONATIONTYPE',
        'ID_DEFERREDREASON',
        'COD_DONATIONKIND',
        'ID_MEDICALREMARK',
        'COD_CHECKUP',
        'COD_PHLEBOTOMY',
        'COD_DONATION',
        'LOG_DIRECTED',
        'ID_CENTRE'
    ];

    public function deferredreason()
    {
        return $this->belongsTo(DeferredReason::class, 'ID_DEFERREDREASON');
    }
}