<?php

namespace App\Models\countriesstatestowns;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class states extends Model
{
    use HasFactory;

    protected $table = "states";

    protected $primaryKey = "ID_STATE";

    protected $fillable = [
        'ID_STATE',
        'country',
        'statename',
    ];

    protected $guarded = [
        'updated_at',
        'created_at'
    ];


    public function countries()
    {
        return $this->belongsTo(countries::class, 'country', 'id');
    }

    public function towns()
    {
        return $this->hasMany(Town::class, 'id');
    }
}
