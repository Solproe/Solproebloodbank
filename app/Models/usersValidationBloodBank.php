<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usersValidationBloodBank extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_centre',
        'email',
        'phoneNumber',
        'identification'
    ];

    protected $primaryKey = 'id';

    public function center()
    {
        return $this->belongsTo(Center::class, 'id_centre');
    }
}