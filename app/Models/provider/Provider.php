<?php

namespace App\Models\provider;

use App\Models\countriesstatestowns\Town;
use App\Models\State;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    /* use HasFactory; */
    protected $table = 'provider';
    protected $fillable = [
        'tax_identification',
        'id_regimens',
        'check_digital',
        'name',
        'ID_TOWN',
        'address',
        'phones',
        'mobile',
        'email',
        'CITIZENSHIP_CARD',
        'legal_representative',
        'LANDLINE',
    ];
    public function states()
    {
        return $this->belongsTo(state::class, 'ID_STATE');
        /*  return $this->belongsTo(state::class, 'ID_STATE') */
    }

    public function towns()
    {
        return $this->belongsTo(Town::class, 'ID_TOWN');
        /* return $this->hasMany(town::class, 'ID_TOWN'); */
    }
    public function url()
    {
        return $this->id ? 'admin.providers.update' : 'admin.providers.store';
    }

    public function method()
    {
        return $this->id ? 'PUT' : 'POST';
    }

}
