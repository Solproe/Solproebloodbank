<?php

namespace App\Models\countriesstatestowns;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    use HasFactory;

    protected $table = 'towns';
    protected $fillable = [
        'ID_TOWN',
        'ID_STATE',
        'name',
    ];
    protected $primaryKey = 'ID_TOWN';

    public function states()
    {
        return $this->belongsTo(State::class, 'ID_STATE');

    }

    public function requestorings()
    {
        return $this->belongsTo(Requestoring::class, 'ID_TOWN');

    }

}
