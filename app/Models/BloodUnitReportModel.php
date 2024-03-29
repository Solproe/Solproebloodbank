<?php

namespace App\Models;

use App\Models\teams\Teams;
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

    public function team()
    {
        return $this->belongsTo(Teams::class, 'team_id');
    }

    public function center()
    {
        return $this->belongsTo(Center::class);
    }
}
