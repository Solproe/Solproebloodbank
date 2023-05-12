<?php

namespace App\Models\status;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inventories\supplies\supplies;
use App\Models\ValidateReceived\ValidateReceivedModel;

class status extends Model
{
    use HasFactory;

    protected $table = 'status';

    protected $fillable= [
        'id',
        'status_name'
    ];

    public function supplies(){
        return $this->hasMany(supplies::class, 'id');
    }

    public function validateReceived()
    {
        return $this->hasMany(ValidateReceivedModel::class, 'id');
    }
}
