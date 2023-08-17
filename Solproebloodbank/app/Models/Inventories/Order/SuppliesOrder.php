<?php

namespace App\Models\Inventories\Order;

use App\Models\Inventories\supplies\supplies;
use App\Models\Inventorie\Order\RequestOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuppliesOrder extends Model
{
    use HasFactory;

    protected $table = 'order_supplies';

    protected $fillable = [

        'id',
        'id_order',
        'id_supplies',
        'quantity',
        'created_at',
        'updated_at',
    ];

    public function requestorder()
    {
        return $this->belongsTo(RequestOrder::class, 'id_order');
    }

    public function supplies()
    {
        return $this->belongsTo(supplies::class, 'id_supplies');
    }
}
