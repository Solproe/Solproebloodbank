<?php

namespace App\Models\ValidateReceived;

use App\Models\Center;
use App\Models\delivery;
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
        'customer',
        'id_user',
        'date',
        'unities',
        'boxes',
        'id_status',
        'received_date',
        'news',
        'through',
        'sender',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function status()
    {
        return $this->belongsTo(status::class, 'id_status');
    }

    public function delivery()
    {
        return $this->belongsTo(delivery::class, 'through');
    }

    public function center()
    {
        return $this->belongsTo(Center::class, 'customer');
    }

    public function send()
    {
        //
    }
}
