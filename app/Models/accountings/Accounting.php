<?php

namespace App\Models\accountings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounting extends Model
{
    use HasFactory;
    protected $table = 'pettycashs';
    protected $fillable = [
        'date',
        'number',
        'movement_type',
        'document_type',
        'providers',
        'description',
        'quantity',
        'cost_unit',
        'supply'
    ];
}
