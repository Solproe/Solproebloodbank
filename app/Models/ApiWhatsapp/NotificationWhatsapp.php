<?php

namespace App\Models\ApiWhatsapp;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationWhatsapp extends Model
{
    use HasFactory;

    protected $table ='notification_whatsapp';

    protected $fillabel = [
        'id',
        'COD_CIVILID',
        'phonenumber',
        'status',
        'updated_at'
    ];

    protected $timestap = true;
}
