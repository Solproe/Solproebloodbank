<?php

namespace App\Models\Inventories;

use App\Models\Inventories\Town;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requestoring extends Model
{
    use HasFactory;
    protected $table = 'requestoring';
    protected $primaryKey = 'ID_REQUESTORIG';
    public $timestamps = false;
    protected $fillable = [
        'ID_REQUESTORIG',
        'NIT',
        'CHECK_DIGITAL',
        'REGIME',
        'correo',
        'DES_REQUESTORIG',
        'DES_ADDRESS',
        'persona_encargada',
        'CITIZENSHIP_CARD',
        'LANDLINE',
        'MOBILE',
        'ID_STATE',
        'ID_TOWN',
        'DES_AREA',
        'NEIGHBORHOOD',
    ];

    //many to many relationship

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
        return $this->ID_REQUESTORIG ? 'admin.requestorings.update' : 'admin.requestorings.store';
    }

    public function method()
    {
        return $this->ID_REQUESTORIG ? 'PUT' : 'POST';
    }
}
