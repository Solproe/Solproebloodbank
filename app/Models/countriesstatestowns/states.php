<?php

namespace App\Models\countriesstatestowns;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class states extends Model
{
    use HasFactory;

    protected $table = "states";

    protected $promaryKey = "ID_TOWNS";

    protected $fillable = [
        'ID_STATE',
        'country',
        'statename',
    ];

    public function countries()
    {
        return $this->belongsTo(countries::class, 'id');
    }

    public function towns()
    {
        return $this->hasMany(Town::class, 'id');
    }
}
