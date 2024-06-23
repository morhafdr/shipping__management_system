<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trips extends Model
{
    use HasFactory;
    protected $fillable = [
        'truck_id',
        'trip_date',
        'departure_time',
        'status',
        'destination_location',
    ];

    public function truck()
    {
        return $this->belongsTo(Truck::class,'truck_id');
    }
}
