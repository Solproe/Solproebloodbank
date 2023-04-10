<?php

namespace App\Models\Donor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeferredReason extends Model
{
    use HasFactory;

    protected $table = 'deferredreason';

    protected $primaryKey = 'ID_DEFERREDREASON';

    protected $fillable = [

        'ID_DEFERREDREASON',
        'COD_DEFERREDREASON',
        'DES_DEFERREDREASON',
        'COD_DEFERREDTYPE',
        'NUM_DEFERREDDAYS',
        'LOG_ACTIVE',
        'idtpdiferimiento'
    ];

    public function offer()
    {
        return $this->hasMany(Offer::class, 'ID_OFFER');
    }

    public function person()
    {
        return $this->hasMany(Person::class, 'ID_PERSON');
    }
}
