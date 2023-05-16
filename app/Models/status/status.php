<?php

namespace App\Models\status;

use App\Models\inventories\supplies\Order_Request;
use App\Models\Inventories\supplies\supplies;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    use HasFactory;

    protected $table = 'status';

    protected $fillable = [
        'id',
        'status_name',
    ];

    public function supplies()
    {
        return $this->hasMany(supplies::class, 'id');
    }

    public function status_id()
    {
        return $this->hasMany(order_request::class, 'status');
    }

    public static function status($id)
    {
        return supplies::where('id_status', '=', $id)
            ->get();
    }

}
