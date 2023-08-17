<?php

namespace App\Models\Donor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationType extends Model
{
    use HasFactory;

    protected $table = 'donationtype';

    protected $primaryKey = 'ID_DONATIONTYPE';

    protected $fillable = [

        'ID_DONATIONTYPE',
        'DES_DONATIONTYPE',
        'NUM_ORDER',
        'COD_DONATIONKIND',
        'COD_ESPECIAL',
        'NUM_AGEFROM',
        'NUM_AGETO',
        'ESTADO'
    ];

    public function donation()
    {
        return $this->hasMany(Donation::class, 'ID_DONATION');
    }
}
