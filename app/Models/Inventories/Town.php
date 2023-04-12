<?php

namespace App\Models\Inventories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    use HasFactory;

    protected $table = 'towns';
    protected $fillable = [
        'ID_STATE',
        'name',
        'code',
    ];
    protected $primaryKey = 'ID_TOWN';

    /*   public function states()
    {
    return $this->hasMany(State::class);
    } */

    public function states()
    {
        return $this->belongsTo(State::class, 'ID_STATE');

    }

    public function requestorings()
    {
        return $this->belongsTo(Requestoring::class, 'ID_TOWN');

    }

}
