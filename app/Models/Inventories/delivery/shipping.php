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
        'fromdate' => 'datetime',
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
        $query->when($reportElementsShipping['center'] ?? null, function ($query, $center) {
            $query->where('customer', $center);

        })->when($reportElementsShipping['through'] ?? null, function ($query, $through) {
            $query->where('through', $through);

        })->when($filters['fromDate'] ?? null, function ($query, $fromDate) {

            $query->where('date_delivery', '>=', $fromDate . ' 00:00:00');
            dd($fromDate);

        })->when($filters['toDate'] ?? null, function ($query, $toDate) {

            $query->where('date_delivery', '<=', $toDate . ' 23:59:59');

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
