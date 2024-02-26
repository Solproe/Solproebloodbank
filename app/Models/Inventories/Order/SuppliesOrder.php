<?php

namespace App\Models\Inventories\Order;

use App\Models\Inventories\supplies\supplies;
use App\Models\Inventories\Order\RequestOrder as OrderRequestOrder;
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
        return $this->belongsTo(OrderRequestOrder::class, 'id_order', 'id');
    }

    public function supplies()
    {
        return $this->belongsTo(supplies::class, 'id_supplies');
    }
}
