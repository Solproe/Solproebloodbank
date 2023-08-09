<?php

namespace App\Models\Inventories\delivery;

use App\Models\Center;
use App\Models\delivery;
use App\Models\status\status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class validatereceived extends Model
{
    use HasFactory;

    protected $table = 'validate_received';

    protected $primaryKey = 'id';

    protected $attributes = ['validate_received'];

    protected $casts = [
        'create_at' => 'datetime:d/m/Y',

    ];

    protected $fillable = [
        'create_at',
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

/* Query Scopes */

    public function scopefilterElement($query, $reportElementsShipping)
    {

        $query->when($reportElementsShipping['center'] ?? null, function ($query, $center) {
            $query->where('customer', $center);
        })->when($reportElementsShipping['through'] ?? null, function ($query, $through) {
            $query->where('through', $through);

        })->when($reportElements['fromdate'] ?? null, function ($query, $fromdate) {
            $query->where('created_to', '>=', $fromdate);

        })->when($reportElements['todate'] ?? null, function ($query, $todate) {
            $query->where('created_to', '<=', $todate);

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
