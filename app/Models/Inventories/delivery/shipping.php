<?php

namespace App\Models\inventories\delivery;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipping extends Model
{
    use HasFactory;

    protected $table = 'delivery';

    protected $primaryKey = 'id_delivery';

    protected $attributes = ['delivery'];

    protected $casts = [
        'create_at' => 'datetime:d/m/Y', // Change your format
        /* 'updated_at' => 'datetime:d/m/Y', */
    ];

    protected $fillable = [
        'id_delivery',
        'des_delivery',
        'create_at',
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
