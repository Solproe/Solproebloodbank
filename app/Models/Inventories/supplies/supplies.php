<?php

namespace App\Models\Inventories\supplies;

use App\Models\Inventories\Order\ShoppingSupplies;
use App\Models\Inventories\Order\SuppliesOrder;
use App\Models\Inventories\storage\warehouse_movement;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\process\step_process;
use App\Models\status\status;

class supplies extends Model
{
    use HasFactory;
    protected $table = 'supplies';

    protected $fillable= [

        'id',
        'supply_cod',
        'supply_name',
        'supply_description',
        'status'
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
    
}
