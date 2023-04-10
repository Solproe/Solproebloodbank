<?php

namespace App\Models\Inventories\Order;

use App\Models\Inventorie\Order\RequestOrder as OrderRequestOrder;
use App\Models\Inventories\storage\warehouse_movement;
use App\Models\provider\Provider;
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
        'id_provider',
        'ordertype',
        'created_at',
        'updated_at'
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

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'id_provider');
    }
}
