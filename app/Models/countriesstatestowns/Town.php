<?php

namespace App\Models\countriesstatestowns;

use App\Models\Center;
use App\Models\Inventories\Requestoring;
use App\Models\provider\Provider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    use HasFactory;

    protected $table = 'towns';
    protected $fillable = [
        'ID_TOWN',
        'ID_STATE',
        'name',
    ];
    protected $primaryKey = 'ID_TOWN';

    public function states()
    {
        return $this->belongsTo(states::class, 'ID_STATE', 'ID_STATE');

    }

    public function requestorings()
    {
        return $this->belongsTo(Requestoring::class, 'ID_TOWN');

    }

    public function center()
    {
        return $this->hasMany(Center::class, 'town', 'ID_TOWN');
    }

    public function providers()
    {
        return $this->hasMany(Provider::class, 'id');
    }
}
