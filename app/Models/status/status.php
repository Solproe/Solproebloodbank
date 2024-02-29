<?php

namespace App\Models\status;

use App\Models\Center;
use App\Models\Inventories\delivery\validatereceived;
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

    public function validatereceived()
    {
        return $this->hasMany(validatereceived::class, 'id');
    }

    public function center()
    {
        return $this->hasMany(Center::class);
    }
}
