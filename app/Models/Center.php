<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;
    protected $table = 'centre';
    protected $fillabel = ['DES_CENTRE'];
    protected $primaryKey = 'ID_CENTRE';

}
