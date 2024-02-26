<?php

namespace App\Models\teams;

use App\Models\User;
use FontLib\Table\Type\name;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    use HasFactory;


    protected $fillable = [
        'id',
        'name'
    ];


    public function users()
    {
        return $this->hasMany(User::class);
    }
}
