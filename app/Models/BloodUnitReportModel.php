<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodUnitReportModel extends Model
{
    use HasFactory;

    protected $table = "blood_collection";

    protected $fillable = [
        'id',
        'team_id',
        'geolocation',
        'quantity',
        'center_id',
    ];
}
