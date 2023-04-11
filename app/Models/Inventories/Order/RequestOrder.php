<?php

namespace App\Models\Inventories\Order;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestOrder extends Model
{
    use HasFactory;

    protected $table = 'order_request';

    protected $fillable = [
        'id',
        'id_applicant',
        'status',
        'created_at',
        'updated_at',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_applicant');
    }

    public function suppliesorder()
    {
        return $this->hasMany(RequestOrder::class, 'id');
    }

    public function warehouse()
    {
        return $this->morphOne('App\Models\Inventories\storage\warehouse_movement', 'warehouseable');
    }
}
