<?php

namespace App\Models\Inventories\storage;

use App\Models\Inventories\Order\RequestOrder;
use App\Models\Inventories\supplies\supplies;
use App\Models\teams\Teams;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class warehouse_movement extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_team',
        'id_order',
        'id_supply',
        'movement_type',
        'quantity',
        'balance',
        'created_at',
        'updated_at'
    ];

    public function warehouseable()
    {
        return $this->morphTo();
    }

    public function supplies()
    {
        return $this->belongsTo(supplies::class, 'id_supply', 'id');
    }

    public function order()
    {
        return $this->belongsTo(RequestOrder::class, 'id_order', 'id');
    }

    public function teams()
    {
        return $this->belongsTo(Teams::class, 'id_team', 'id');
    }
}
