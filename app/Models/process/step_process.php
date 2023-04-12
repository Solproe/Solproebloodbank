<?php

namespace App\Models\process;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class step_process extends Model
{
    use HasFactory;

    protected $table = 'step_process';

    protected $fillable= 
    [
        'id',
        'process_name',
        'step_process_description'
        
    ];
}
