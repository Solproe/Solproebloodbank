<?php

namespace App\Models\Donor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = 'person';

    protected $primaryKey = 'ID_PERSON';

    protected $attributes = ['person'];

    protected $casts = [
        'DAT_ENTRY' => 'datetime:d/m/Y', // Change your format
        /* 'updated_at' => 'datetime:d/m/Y', */
    ];

    protected $fillable = [
        'ID_PERSON',
        'ID_DONORTYPE',
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
        'ID_DEFERREDREASON',
        'DES_EMAIL',
        'TPDOC',
        'DES_NAME1',
        'DES_NAME2',
        'DES_SURNAME1',
        'DES_SURNAME2',
        'DAT_MODIFIED',
        'DES_DONATIONTYPE',
        'ID_DONATIONTYPE',
        'DAT_ENTRY',
    ];

/* Query Scopes */

    public function scopereportElement($query, $reportElements)
    {
        $query->when($reportElements['type_donor'] ?? null, function ($query, $type_donor) {
            $query->where('ID_DONATIONTYPE', $type_donor);

        })->when($reportElements['fromdate'] ?? null, function ($query, $fromdate) {
            $query->where('DAT_ENTRY', '>=', $fromdate);

        })->when($reportElements['todate'] ?? null, function ($query, $todate) {
            $query->where('DAT_ENTRY', '<=', $todate);

        });

    }

    public function deferredreason()
    {
        return $this->belongsTo(DeferredReason::class, 'ID_DEFERREDRASON');
    }

    public function donation()
    {
        return $this->hasMany(Donation::class, 'ID_DONATION');
    }

    public function donationtype()
    {
        return $this->belongsTo(DonationType::class, 'ID_DONATIONTYPE');
    }

    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }

}
