<?php

namespace App\Models\inventories\supplies;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagingFactor extends Model
{
    use HasFactory;

    protected $table = 'packaging_factor';

    protected $fillable= [

        'id',
        'name'
    ];
}