<?php

namespace App\Models\inventories\supplies;

use App\Models\Inventories\Order\SuppliesOrder;
use App\Models\status\status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Request extends Model
{
    use HasFactory;
    protected $table = 'order_request';

    protected $fillable = [

        'id',
        'status',
        'id_applicant',
        'created_at',
        'status_name',
    ];
    public function status_id()
    {
        return $this->belongsTo(status::class, 'status');
    }

    public function suppliesorder()
    {
        return $this->hasMany(SuppliesOrder::class, 'id');
    }

    public function warehouse()
    {
        return $this->hasMany(warehouse_movement::class, 'id');
    }

    public function shopping()
    {
        return $this->hasMany(ShoppingSupplies::class, 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_applicant');
    }

    /*  public function status()
{
return $this->hasMany(status::class, 'status');
} */
}
