<?php

namespace App\Models\status;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inventories\supplies\supplies;

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

    public static function status($id){
        return supplies::where('id_status','=',$id)
        ->get();
    }
    
}
