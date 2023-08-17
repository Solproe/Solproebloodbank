<?php

namespace App\Models\Donor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $table = 'donation';

    protected $primaryKey = 'ID_DONATION';

    protected $fillable = [

        'ID_DONATION',
        'COD_DONATION',
        'DAT_DONATION',
        'TIM_DONATION',
        'ID_DONATIONTYPE',
        'ID_PERSON',
        'ID_BAGTYPE',
        'ID_USR',
        'COD_VALIDATED',
        'COD_BLOODTYPE',
        'ID_CENTRE'
    ];

    public function donationtype()
    {
        return $this->belongsTo(DonationType::class, 'ID_DONATIONTYPE');
    }

    public function donor()
    {
        return $this->belongsTo(Person::class, 'ID_PERSON');
    }
}
