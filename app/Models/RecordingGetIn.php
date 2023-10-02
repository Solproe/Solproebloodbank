<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordingGetIn extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'email',
        'phoneNumber'
    ];

    protected $table = 'recording_get_in';
}
