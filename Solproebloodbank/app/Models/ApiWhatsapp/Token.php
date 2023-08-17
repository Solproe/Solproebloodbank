<?php

namespace App\Models\ApiWhatsapp;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    protected $table = "token";

    protected $fillable = [

        'id',
        'whatsapp',
        'sihevi',
        'messenger',
        'instagram',
        'updated_at',
        'ID_CENTRE'
    ];
}
