<?php

namespace App\Models\Requests;

use App\Models\Ambulances\Ambulances;
use App\Models\Status\status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;

    protected $table = 'requests';

    protected $fillable = [
        'id',
        'id_ambulance',
        'id_status',
        'type',
        'id_user',
        'address',
        'details',
        'started',
        'finished',
        'created_at',
        'updated_at',
    ];

    public function ambulances()
    {
        return $this->belongsTo(Ambulances::class, 'id_ambulance');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function status()
    {
        return $this->belongsTo(status::class, 'id_status');
    }
}
