<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class delivery extends Model
{
    use HasFactory;
    protected $table = 'delivery';
    protected $fillabel = ['id_delivery', 'des_delivery','time_delivery'];
    protected $primaryKey = 'id_delivery';
}
