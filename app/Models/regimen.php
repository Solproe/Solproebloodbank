<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class regimen extends Model
{
    use HasFactory;
    protected $table = 'regimens';
    protected $fillabel = ['name'];
    protected $primaryKey = 'id_regimens';

}
