<?php

namespace App\Models\ValidateReceived;

use App\Models\status\status;
use App\Models\User;
use App\Services\RequestInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValidateReceivedModel extends Model implements RequestInterface
{
    use HasFactory;

    protected $table = 'validate_received';

    protected $fillable = [
        'id',
        'consecutive',
        'id_user',
        'date',
        'interval',
        'unities',
        'boxes',
        'id_status',
        'received_date',
        'news',
        'through',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function status()
    {
        return $this->belongsTo(status::class, 'id_status');
    }

    public function send()
    {
        //code
    }
}
