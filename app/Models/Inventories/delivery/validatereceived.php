<?php

namespace App\Models\Inventories\delivery;

use App\Models\Center;
use App\Models\delivery;
use App\Models\status\status;
use App\Models\User;
use App\Services\RequestInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class validatereceived extends Model implements RequestInterface
{
    use HasFactory;

    protected $table = 'validate_received';

    protected $primaryKey = 'id';

    protected $casts = [

        'created_at' => 'date:d-m-Y',
        'updated_at' => 'date:d-m-Y',
        'received_date' => 'date:d-m-Y',
        'date_delivery' => 'dateTime',
        'fromdate' => 'dateTime',

    ];

    protected $fillable = [
        'id',
        'consecutive',
        'id_user',
        'date',
        'unities',
        'boxes',
        'customer',
        'id_status',
        'received_date',
        'news',
        'through',
        'sender',
        'created_at',
        'updated_at',
    ];

/* Query Scopes */

    public function scopefilterElement($query, $reportElementsShipping)
    {

        $query->when($reportElementsShipping['center'] ?? null, function ($query, $center) {
            $query->where('customer', $center);

        })->when($reportElementsShipping['through'] ?? null, function ($query, $through) {
            $query->where('through', $through);

        })->when($reportElementsShipping['fromDate'] ?? null, function ($query, $fromDate) {
            $query->where('date_delivery', '>=', $fromDate);
            dd($fromDate);

        })->when($reportElementsShipping['toDate'] ?? null, function ($query, $toDate) {

            $query->where('date_delivery', '<=', $toDate);

        });

    }

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
