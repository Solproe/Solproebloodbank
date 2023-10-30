<?php

namespace App\Models\countriesstatestowns;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class states extends Model
{
    use HasFactory;

    public function countries()
    {
        return $this->belongsTo(countries::class, 'id');

    }
}
